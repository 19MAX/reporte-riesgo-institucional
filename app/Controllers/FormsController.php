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

    public function __construct()
    {
        $this->usersModel = new UsersModel();
        $this->fichasModel = new FichasModel();
    }

    public function index($id)
    {
        $id_campus = $this->usersModel->obtenerIdCampus($id);
        $message = [
            "message" => "NO EXISTE EL CAMPUS",
        ];
        if (!$id_campus) {
            return view("errors/html/error_404", $message);
        }

        $data = [
            "id_analista" => $id,
            "id_campus" => $id_campus,
            "modulo" => ModulosAdmin::USERS,
        ];

        return view("admin/forms/index", $data);
    }

    public function insertFichas()
    {
        try {
            // Obtener el contenido JSON del cuerpo de la solicitud
            $data = $this->request->getJSON(true); // true = retorna como arreglo asociativo

            if (!$data) {
                return $this->response
                    ->setStatusCode(400)
                    ->setJSON(['error' => 'No se recibieron datos en la solicitud']);
            }

            // Extraer y validar datos
            $seguridad_estructural     = $data['seguridad_estructural'][0]['data'] ?? null;
            $seguridad_no_estructural  = $data['seguridad_no_estructural'] ?? null;
            $seguridad_funcional       = $data['seguridad_funcional'] ?? null;
            $seguridad_administrativa  = $data['seguridad_administrativa'] ?? null;

            if ($seguridad_estructural || $seguridad_no_estructural || $seguridad_funcional || $seguridad_administrativa) {

                $result = $this->fichasModel->insertarTodosDatos(
                    $seguridad_estructural,
                    $seguridad_no_estructural,
                    $seguridad_funcional,
                    $seguridad_administrativa
                );

                if ($result === true) {
                    return $this->response
                        ->setStatusCode(200)
                        ->setJSON(['message' => 'Datos insertados correctamente']);
                } else {
                    return $this->response
                        ->setStatusCode(502)
                        ->setJSON(['error' => $result]);
                }
            } else {
                return $this->response
                    ->setStatusCode(400)
                    ->setJSON(['error' => 'Faltan campos obligatorios en el formato de datos']);
            }
        } catch (\Exception $e) {
            return $this->response
                ->setStatusCode(500)
                ->setJSON(['error' => 'Error del servidor: ' . $e->getMessage()]);
        }
    }

}
