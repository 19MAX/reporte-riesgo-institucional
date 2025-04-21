<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\CampusModel;
use App\Models\SedeModel;
use CodeIgniter\HTTP\ResponseInterface;
use ModulosAdmin;

class CampusController extends BaseController
{
    protected $campusModel;
    protected $sedeModel;

    private function redirectView($validation = null, $flashMessages = null, $last_data = null, $last_action = null, $id = null)
    {
        return redirect()->to("admin/campus/$id")->
            with('flashValidation', isset($validation) ? $validation->getErrors() : null)->
            with('flashMessages', $flashMessages)->
            with('last_data', $last_data)->
            with('last_action', $last_action);
    }

    public function __construct()
    {
        $this->campusModel = new CampusModel();
        $this->sedeModel = new SedeModel();
    }

    public function index($id)
    {

        $campus = $this->campusModel->getAllCampus($id);
        $sede = $this->sedeModel->find($id);

        $data = [
            "modulo" => ModulosAdmin::CAMPUS,
            "campus" => $campus,
            "id_sede" => $id,
            "id_ies" => $sede["id_IES"]
        ];

        return view("admin/campus/index", $data);
    }

    public function getAllCampus()
    {

        $data = $this->campusModel->getCampus();

        return $this->response->setJSON($data);
    }

    public function getCampus()
    {
        // Para la petición GET con parámetro id
        $id = $this->request->getGet('id');

        if (!$id) {
            return $this->response->setStatusCode(400)
                ->setContentType('application/json')
                ->setJSON(['error' => 'Missing parameter: id']);
        }


        $data = $this->campusModel->getCampusBySede($id);

        if ($data === false) {
            return $this->response->setStatusCode(500)
                ->setContentType('application/json')
                ->setJSON(['error' => 'Error al obtener los campus']);
        }

        if (empty($data)) {
            return $this->response->setStatusCode(204);
        }

        return $this->response->setContentType('application/json')
            ->setJSON($data);
    }


    public function add()
    {
        $id_sede = $this->request->getPost('id_sede');
        $nombreCampus = $this->request->getPost('nombreCampus');
        $direccionCampus = $this->request->getPost('direccionCampus');
        $cantonInput = $this->request->getPost('cantonInput');
        $parroquiaInput = $this->request->getPost('parroquiaInput');


        $data = [
            'id_sede' => trim($id_sede),
            'nombre' => trim($nombreCampus),
            'direccion' => trim($direccionCampus),
            'canton' => trim($cantonInput),
            'parroquia' => trim($parroquiaInput),
        ];

        try {
            $validation = \Config\Services::validation();
            $validation->setRules(
                [
                    'id_sede' => [
                        'label' => 'Id',
                        'rules' => 'required|numeric',
                    ],
                    'nombre' => [
                        'label' => 'Nombre del campus',
                        'rules' => 'required|min_length[3]|max_length[100]',
                    ],
                    'direccion' => [
                        'label' => 'Dirección del campus',
                        'rules' => 'required|min_length[5]|max_length[255]',
                    ],
                    'canton' => [
                        'label' => 'Canton del campus',
                        'rules' => 'required|min_length[5]|max_length[255]',
                    ],
                    'parroquia' => [
                        'label' => 'Parroquia del campus',
                        'rules' => 'required|min_length[5]|max_length[255]',
                    ],
                ]
            );

            if ($validation->run($data)) {

                $nuevo_campus = $this->campusModel->insert($data);

                if (!$nuevo_campus) {
                    return $this->redirectView(null, [['No fue posible guardar el nuevo campus', 'warning']], $data, 'insert', $id_sede);
                } else {
                    return $this->redirectView(null, [['Campus agregado exitosamente', 'success']], null, null, $id_sede);
                }
            } else {
                return $this->redirectView($validation, [['Error en los datos enviados', 'warning']], $data, 'insert', $id_sede);
            }
        } catch (\Exception $e) {
            return $this->redirectView(null, [['No se pudo registrar el campus', 'danger']], null, null, $id_sede);
        }
    }

    public function update()
    {
        $id_sede = $this->request->getPost('id_sede');
        $id_campus = $this->request->getPost('id_campus');
        $nombreCampus = $this->request->getPost('nombreCampus');
        $direccionCampus = $this->request->getPost('direccionCampus');
        $cantonInput = $this->request->getPost('cantonInput');
        $parroquiaInput = $this->request->getPost('parroquiaInput');

        // Validación básica de existencia de IDs
        if (empty($id_sede) || empty($id_campus)) {
            return $this->redirectView(null, [['Faltan datos necesarios para actualizar el campus.', 'danger']], null, null, $id_sede);
        }

        // Verificar que existe la sede
        $sede = $this->sedeModel->find($id_sede);
        if (!$sede) {
            return $this->redirectView(null, [['La sede especificada no existe.', 'danger']], null, null, $id_sede);
        }

        // Verificar que existe el campus
        $campus = $this->campusModel->find($id_campus);
        if (!$campus) {
            return $this->redirectView(null, [['El campus especificado no existe.', 'danger']], null, null, $id_sede);
        }

        // Verificar que el campus pertenece a la sede
        if ($campus['id_sede'] != $id_sede) {
            return $this->redirectView(null, [['El campus no pertenece a la sede especificada.', 'danger']], null, null, $id_sede);
        }

        // Preparar datos para actualizar
        $data = [
            'nombre' => trim($nombreCampus),
            'direccion' => trim($direccionCampus),
            'canton' => trim($cantonInput),
            'parroquia' => trim($parroquiaInput)
        ];

        try {
            $validation = \Config\Services::validation();
            $validation->setRules(
                [
                    'nombre' => [
                        'label' => 'Nombre del campus',
                        'rules' => 'required|min_length[3]|max_length[100]',
                    ],
                    'direccion' => [
                        'label' => 'Dirección del campus',
                        'rules' => 'required|min_length[5]|max_length[255]',
                    ],
                    'canton' => [
                        'label' => 'Cantón',
                        'rules' => 'required|min_length[3]|max_length[100]',
                    ],
                    'parroquia' => [
                        'label' => 'Parroquia',
                        'rules' => 'required|min_length[3]|max_length[100]',
                    ]
                ]
            );

            if ($validation->run($data)) {
                $update_campus = $this->campusModel->update($id_campus, $data);

                if (!$update_campus) {
                    return $this->redirectView(null, [['No fue posible actualizar el campus.', 'warning']], $data, 'insert', $id_sede);
                } else {
                    return $this->redirectView(null, [['Campus actualizado exitosamente.', 'success']], null, null, $id_sede);
                }
            } else {
                return $this->redirectView($validation, [['Error en los datos enviados.', 'warning']], $data, 'insert', $id_sede);
            }
        } catch (\Exception $e) {
            return $this->redirectView(null, [['No se pudo actualizar el campus.', 'danger']], null, null, $id_sede);
        }
    }


    public function delete()
    {
        $id_sede = $this->request->getPost('id_sede');
        $id_campus = $this->request->getPost('id_campus');

        // Validación básica de existencia de IDs
        if (empty($id_sede) || empty($id_campus)) {
            return $this->redirectView(null, [['Faltan datos necesarios para eliminar el campus.', 'danger']], null, null, $id_sede);
        }

        // Verificar que existe la sede
        $sede = $this->sedeModel->find($id_sede);
        if (!$sede) {
            return $this->redirectView(null, [['La sede especificada no existe.', 'danger']], null, null, $id_sede);
        }

        // Verificar que existe el campus
        $campus = $this->campusModel->find($id_campus);
        if (!$campus) {
            return $this->redirectView(null, [['El campus especificado no existe.', 'danger']], null, null, $id_sede);
        }

        // Verificar que el campus pertenece a la sede
        if ($campus['id_sede'] != $id_sede) {
            return $this->redirectView(null, [['El campus no pertenece a la sede especificada.', 'danger']], null, null, $id_sede);
        }

        try {
            // Intentar eliminar el campus
            $deleted = $this->campusModel->delete($id_campus);

            if (!$deleted) {
                return $this->redirectView(null, [['No se pudo eliminar el campus.', 'warning']], null, null, $id_sede);
            } else {
                return $this->redirectView(null, [['Campus eliminado exitosamente.', 'success']], null, null, $id_sede);
            }
        } catch (\Exception $e) {
            return $this->redirectView(null, [['Ocurrió un error al intentar eliminar el campus.', 'danger']], null, null, $id_sede);
        }
    }

}
