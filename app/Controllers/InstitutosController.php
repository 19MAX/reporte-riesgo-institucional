<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\InstitutoModel;
use CodeIgniter\HTTP\ResponseInterface;
use ModulosAdmin;

class InstitutosController extends BaseController
{
    protected $institutoModel;

    public function __construct()
    {
        $this->institutoModel = new InstitutoModel();
    }

    public function index()
    {
        $data = [
            "modulo" => ModulosAdmin::INSTITUTOS,
        ];

        return view("admin/institutos/index", $data);
    }

    public function addView()
    {
        $data = [
            "modulo" => ModulosAdmin::INSTITUTOS,
        ];

        return view("admin/institutos/agregar", $data);
    }

    // GET /institutos
    public function getInstitutos()
    {
        try {
            $data = $this->institutoModel->getAll();
            if (empty($data)) {
                return $this->response->setStatusCode(ResponseInterface::HTTP_NO_CONTENT);
            }
            return $this->response->setJSON($data)->setStatusCode(ResponseInterface::HTTP_OK);
        } catch (\Exception $e) {
            return $this->response->setStatusCode(500)->setJSON(['error' => $e->getMessage()]);
        }

        // $data = $this->institutoModel->getAll();
        // return $this->response->setJSON($data);
    }

    // POST /institutos
    public function insertIes()
    {
        try {
            // Obtener datos POST
            $nombre = trim($this->request->getPost('nombre'));
            $codigo = trim($this->request->getPost('codigo'));
            $provincia = trim($this->request->getPost('provincia'));
            $canton = trim($this->request->getPost('canton'));
            $parroquia = trim($this->request->getPost('parroquia'));
            $direccion = trim($this->request->getPost('direccion'));
            $acreditacion = trim($this->request->getPost('acreditacion'));
            $region = trim($this->request->getPost('region'));
            $zona = trim($this->request->getPost('zona'));
            $cordX = $this->request->getPost('cord_x');
            $cordY = $this->request->getPost('cord_y');

            // Manejo del logo (archivo)
            $logo = $this->request->getFile('logo');
            $logoName = null;

            if ($logo && $logo->isValid() && !$logo->hasMoved()) {
                // Generar nombre único para el archivo
                $logoName = $logo->getRandomName();
                // Mover el archivo a la carpeta de assets/uploads
                $uploadPath = FCPATH . 'assets/uploads/logos';

                // Asegurar que el directorio existe
                if (!is_dir($uploadPath)) {
                    mkdir($uploadPath, 0777, true);
                }

                $logo->move($uploadPath, $logoName);
            }

            $data = [
                'nombre' => $nombre,
                'codigo' => $codigo,
                'provincia' => $provincia,
                'canton' => $canton,
                'parroquia' => $parroquia,
                'direccion' => $direccion,
                'acreditacion' => $acreditacion,
                'region' => $region,
                'zona' => $zona,
                'cord_x' => $cordX,
                'cord_y' => $cordY,
                'logo' => $logoName
            ];

            // Validación
            $validation = \Config\Services::validation();
            $validation->setRules([
                'nombre' => [
                    'label' => 'Nombre',
                    'rules' => 'required|min_length[3]',
                ],
                'codigo' => [
                    'label' => 'Código',
                    'rules' => 'required|is_unique[IES.codigo]',
                ],
                'provincia' => [
                    'label' => 'Provincia',
                    'rules' => 'required',
                ],
                'canton' => [
                    'label' => 'Cantón',
                    'rules' => 'required',
                ],
                'parroquia' => [
                    'label' => 'Parroquia',
                    'rules' => 'required',
                ],
                'direccion' => [
                    'label' => 'Dirección',
                    'rules' => 'required',
                ],
                'acreditacion' => [
                    'label' => 'Acreditación',
                    'rules' => 'permit_empty',
                ],
                'region' => [
                    'label' => 'Región',
                    'rules' => 'required',
                ],
                'zona' => [
                    'label' => 'Zona',
                    'rules' => 'required',
                ],
                'cord_x' => [
                    'label' => 'Coordenada X',
                    'rules' => 'permit_empty|decimal',
                ],
                'cord_y' => [
                    'label' => 'Coordenada Y',
                    'rules' => 'permit_empty|decimal',
                ],
            ]);

            if (!$validation->run($data)) {
                return $this->response
                    ->setStatusCode(422)
                    ->setJSON([
                        'success' => false,
                        'errors' => $validation->getErrors(),
                    ]);
            }

            // Registrar instituto
            $resultado = $this->institutoModel->insert($data);
            if ($resultado) {
                return $this->response
                    ->setStatusCode(201)
                    ->setJSON([
                        'success' => true,
                        'message' => 'Instituto registrado correctamente.',
                        'instituto_id' => $resultado
                    ]);
            } else {
                // Si hubo error al subir el logo, eliminarlo
                if ($logoName && file_exists(FCPATH . 'assets/uploads/logos/' . $logoName)) {
                    unlink(FCPATH . 'assets/uploads/logos/' . $logoName);
                }

                return $this->response
                    ->setStatusCode(500)
                    ->setJSON([
                        'success' => false,
                        'error' => 'Error al registrar el instituto.',
                        'db_errors' => $this->institutoModel->errors()
                    ]);
            }
        } catch (\Exception $e) {
            return $this->response
                ->setStatusCode(500)
                ->setJSON([
                    'success' => false,
                    'error' => 'Error interno: ' . $e->getMessage(),
                ]);
        }
    }

    // POST /institutos/update/{id}
    public function updateIes($id)
    {
        try {
            $data = $this->request->getPost();
            $logo = $this->request->getFile('logo');

            $this->institutoModel->actualizarInstituto($id, $data, $logo);

            return $this->response->setJSON(['message' => 'Instituto actualizado correctamente'])
                ->setStatusCode(ResponseInterface::HTTP_OK);
        } catch (\Exception $e) {
            return $this->response->setStatusCode(400)->setJSON(['error' => $e->getMessage()]);
        }
    }

    // POST /institutos/delete/{id}
    public function deleteIes($id)
    {
        try {
            $nombre = $this->request->getPost('nombre');

            $this->institutoModel->eliminarInstituto($id, $nombre);

            return $this->response->setJSON(['message' => 'Instituto eliminado correctamente'])
                ->setStatusCode(ResponseInterface::HTTP_OK);
        } catch (Exception $e) {
            return $this->response->setStatusCode(400)->setJSON(['error' => $e->getMessage()]);
        }
    }
}
