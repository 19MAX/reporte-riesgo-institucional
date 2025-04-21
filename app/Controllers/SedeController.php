<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\InstitutoModel;
use App\Models\SedeModel;
use CodeIgniter\HTTP\ResponseInterface;
use Exception;
use ModulosAdmin;

class SedeController extends BaseController
{
    protected $sedeModel;
    protected $institutoModel;

    private function redirectView($validation = null, $flashMessages = null, $last_data = null, $last_action = null, $id = null)
    {
        return redirect()->to("admin/sede/$id")->
            with('flashValidation', isset($validation) ? $validation->getErrors() : null)->
            with('flashMessages', $flashMessages)->
            with('last_data', $last_data)->
            with('last_action', $last_action);
    }


    public function __construct()
    {
        $this->sedeModel = new SedeModel();
        $this->institutoModel = new InstitutoModel();
    }

    public function index($id)
    {

        $sedes = $this->sedeModel->getAllSedes($id);

        $data = [
            "modulo" => ModulosAdmin::SEDE,
            "sedes" => $sedes,
            "id_ies" => $id
        ];

        return view("admin/sede/index", $data);
    }

    public function add()
    {
        $id_ies = $this->request->getPost('id_ies');
        $nombre_sede = $this->request->getPost('nombreSede');
        $direccion_sede = $this->request->getPost('direccionSede');


        $data = [
            'id_IES' => trim($id_ies),
            'nombre' => trim($nombre_sede),
            'direccion' => trim($direccion_sede),
        ];

        try {
            $validation = \Config\Services::validation();
            $validation->setRules(
                [
                    'id_IES' => [
                        'label' => 'Id',
                        'rules' => 'required|numeric',
                    ],
                    'nombre' => [
                        'label' => 'Nombre de la sede',
                        'rules' => 'required|min_length[3]|max_length[100]',
                    ],
                    'direccion' => [
                        'label' => 'Dirección de la sede',
                        'rules' => 'required|min_length[5]|max_length[255]',
                    ]
                ]
            );

            if ($validation->run($data)) {

                $nueva_sede = $this->sedeModel->insert($data);

                if (!$nueva_sede) {
                    return $this->redirectView(null, [['No fue posible guardar la sede', 'warning']], $data, 'insert', $id_ies);
                } else {
                    return $this->redirectView(null, [['Sede agregada exitosamente', 'success']], null, null, $id_ies);
                }
            } else {
                return $this->redirectView($validation, [['Error en los datos enviados', 'warning']], $data, 'insert', $id_ies);
            }
        } catch (Exception $e) {
            return $this->redirectView(null, [['No se pudo registrar la sede', 'danger']], null, null, $id_ies);
        }
    }

    public function update()
    {
        $id_ies = $this->request->getPost('id_ies');
        $id_sede = $this->request->getPost('id_sede');
        $nombre_sede = $this->request->getPost('nombreSede');
        $direccion_sede = $this->request->getPost('direccionSede');

        // Validación básica de existencia de IDs
        if (empty($id_ies) || empty($id_sede)) {
            return $this->redirectView(null, [['Faltan datos necesarios para actualizar la sede.', 'danger']], null, null, $id_ies);
        }

        // Verificar que existe el instituto
        $instituto = $this->institutoModel->find($id_ies);
        if (!$instituto) {
            return $this->redirectView(null, [['El instituto especificado no existe.', 'danger']], null, null, $id_ies);
        }

        // Verificar que existe la sede
        $sede = $this->sedeModel->find($id_sede);
        if (!$sede) {
            return $this->redirectView(null, [['La sede especificada no existe.', 'danger']], null, null, $id_ies);
        }

        // Verificar que la sede pertenece al instituto
        if ($sede['id_IES'] != $id_ies) {
            return $this->redirectView(null, [['La sede no pertenece al instituto especificado.', 'danger']], null, null, $id_ies);
        }

        $data = [
            'id_sede' => $nombre_sede,
            'nombre' => trim($nombre_sede),
            'direccion' => trim($direccion_sede),
        ];

        try {
            $validation = \Config\Services::validation();
            $validation->setRules(
                [
                    'nombre' => [
                        'label' => 'Nombre de la sede',
                        'rules' => 'required|min_length[3]|max_length[100]',
                    ],
                    'direccion' => [
                        'label' => 'Dirección de la sede',
                        'rules' => 'required|min_length[5]|max_length[255]',
                    ]
                ]
            );

            if ($validation->run($data)) {
                unset($data["id_sede"]);

                $update_sede = $this->sedeModel->update($id_sede, $data);

                if (!$update_sede) {
                    return $this->redirectView(null, [['No fue posible actualizar la sede', 'warning']], $data, 'insert', $id_ies);
                } else {
                    return $this->redirectView(null, [['Sede actualizada exitosamente', 'success']], null, null, $id_ies);
                }
            } else {
                return $this->redirectView($validation, [['Error en los datos enviados', 'warning']], $data, 'insert', $id_ies);
            }
        } catch (Exception $e) {
            return $this->redirectView(null, [['No se pudo actualizar la sede', 'danger']], null, null, $id_ies);
        }
    }

    public function delete()
    {
        $id_ies = $this->request->getPost('id_ies');
        $id_sede = $this->request->getPost('id_sede');

        // Validación básica de existencia de IDs
        if (empty($id_ies) || empty($id_sede)) {
            return $this->redirectView(null, [['Faltan datos necesarios para eliminar la sede.', 'danger']], null, null, $id_ies);
        }

        // Verificar que existe el instituto
        $instituto = $this->institutoModel->find($id_ies);
        if (!$instituto) {
            return $this->redirectView(null, [['El instituto especificado no existe.', 'danger']], null, null, $id_ies);
        }

        // Verificar que existe la sede
        $sede = $this->sedeModel->find($id_sede);
        if (!$sede) {
            return $this->redirectView(null, [['La sede especificada no existe.', 'danger']], null, null, $id_ies);
        }

        // Verificar que la sede pertenece al instituto
        if ($sede['id_IES'] != $id_ies) {
            return $this->redirectView(null, [['La sede no pertenece al instituto especificado.', 'danger']], null, null, $id_ies);
        }

        try {
            // Eliminar la sede (soft delete o hard delete según configuración)
            $deleted = $this->sedeModel->delete($id_sede);

            if ($deleted) {
                return $this->redirectView(null, [['Sede eliminada exitosamente.', 'success']], null, null, $id_ies);
            } else {
                return $this->redirectView(null, [['No fue posible eliminar la sede.', 'warning']], null, null, $id_ies);
            }
        } catch (Exception $e) {
            return $this->redirectView(null, [['No se pudo eliminar la sede.', 'danger']], null, null, $id_ies);
        }
    }

}
