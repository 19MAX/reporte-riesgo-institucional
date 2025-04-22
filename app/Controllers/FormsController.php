<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\FichasModel;
use App\Models\UsersModel;
use CodeIgniter\HTTP\ResponseInterface;
use ModulosAdmin;

class FormsController extends BaseController
{

    protected $usersModel;
    protected $fichasModel;
    protected $logger;

    public function __construct()
    {
        $this->usersModel = new UsersModel();
        $this->fichasModel = new FichasModel();
        // Configurar el logger personalizado para errores del controlador
        $this->logger = \Config\Services::logger();
    }

    public function index($id)
    {
        try {
            $id_campus = $this->usersModel->obtenerIdCampus($id);
            $message = [
                "message" => "NO EXISTE EL CAMPUS",
            ];

            if (!$id_campus) {
                $this->logger->error("Campus no encontrado para el ID: {$id}");
                return view("errors/html/error_404", $message);
            }

            $data = [
                "id_analista" => $id,
                "id_campus" => $id_campus,
                "modulo" => ModulosAdmin::USERS,
            ];

            return view("admin/forms/index", $data);
        } catch (\Exception $e) {
            $this->logError('index', $e);
            return view("errors/html/error_500", ["message" => "Error interno del servidor"]);
        }
    }

    public function insertFichas()
    {
        try {
            // Obtener el contenido JSON del cuerpo de la solicitud
            $data = $this->request->getJSON(true); // true = retorna como arreglo asociativo

            // Registrar datos recibidos para depuración
            $this->logger->info('Datos recibidos en insertFichas: ' . json_encode($data));

            if (!$data) {
                $this->logger->warning('No se recibieron datos en la solicitud');
                return $this->response
                    ->setStatusCode(400)
                    ->setJSON(['error' => 'No se recibieron datos en la solicitud']);
            }

            // Extraer y validar datos
            $seguridad_estructural = $data['seguridad_estructural'][0]['data'] ?? null;
            $seguridad_no_estructural = $data['seguridad_no_estructural'] ?? null;
            $seguridad_funcional = $data['seguridad_funcional'] ?? null;
            $seguridad_administrativa = $data['seguridad_administrativa'] ?? null;

            // Verificar si alguno de los datos requeridos es nulo
            if (!$seguridad_estructural) {
                $this->logger->warning('Datos de seguridad estructural no proporcionados');
            }
            if (!$seguridad_no_estructural) {
                $this->logger->warning('Datos de seguridad no estructural no proporcionados');
            }
            if (!$seguridad_funcional) {
                $this->logger->warning('Datos de seguridad funcional no proporcionados');
            }
            if (!$seguridad_administrativa) {
                $this->logger->warning('Datos de seguridad administrativa no proporcionados');
            }

            if ($seguridad_estructural || $seguridad_no_estructural || $seguridad_funcional || $seguridad_administrativa) {
                $this->logger->info('Iniciando inserción de datos en el modelo');

                $result = $this->fichasModel->insertarTodosDatos(
                    $seguridad_estructural,
                    $seguridad_no_estructural,
                    $seguridad_funcional,
                    $seguridad_administrativa
                );

                if ($result === true) {
                    $this->logger->info('Datos insertados correctamente');
                    return $this->response
                        ->setStatusCode(200)
                        ->setJSON(['message' => 'Datos insertados correctamente']);
                } else {
                    $this->logger->error('Error al insertar datos: ' . (is_string($result) ? $result : json_encode($result)));
                    return $this->response
                        ->setStatusCode(502)
                        ->setJSON(['error' => $result]);
                }
            } else {
                $this->logger->warning('Faltan campos obligatorios en el formato de datos');
                return $this->response
                    ->setStatusCode(400)
                    ->setJSON(['error' => 'Faltan campos obligatorios en el formato de datos']);
            }
        } catch (\Exception $e) {
            $this->logError('insertFichas', $e);
            return $this->response
                ->setStatusCode(500)
                ->setJSON(['error' => 'Error del servidor: ' . $e->getMessage()]);
        }
    }

    /**
     * Registra errores detallados en el archivo de logs
     */
    private function logError($method, \Exception $e)
    {
        $errorMessage = "Error en {$method}: " . $e->getMessage();
        $this->logger->error($errorMessage);
        $this->logger->error("Archivo: " . $e->getFile() . " en línea " . $e->getLine());
        $this->logger->error("Stack trace: " . $e->getTraceAsString());

        // Crear un formato más detallado para errores críticos
        $detailedError = [
            'timestamp' => date('Y-m-d H:i:s'),
            'method' => $method,
            'message' => $e->getMessage(),
            'file' => $e->getFile(),
            'line' => $e->getLine(),
            'trace' => $e->getTraceAsString()
        ];

        // También puedes guardar en un archivo de log separado para errores críticos
        log_message('critical', json_encode($detailedError));
    }
}