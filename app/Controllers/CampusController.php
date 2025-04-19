<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\CampusModel;
use CodeIgniter\HTTP\ResponseInterface;

class CampusController extends BaseController
{
    protected $campusModel;

    public function __construct()
    {
        $this->campusModel = new CampusModel();
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

    public function insertCampus()
    {
        $data = $this->request->getPost();


        $result = $this->campusModel->insertCampus($data);

        if (!$result) {
            return $this->response->setStatusCode(500)
                ->setContentType('application/json')
                ->setJSON(['error' => 'Error al insertar el campus']);
        }

        return $this->response->setStatusCode(200)
            ->setContentType('application/json')
            ->setJSON(['message' => 'Campus creado exitosamente']);
    }

    public function updateCampus()
    {
        $id = $this->request->getPost('id');
        $data = $this->request->getPost();


        $result = $this->campusModel->updateCampus($id, $data);

        if (!$result) {
            return $this->response->setStatusCode(500)
                ->setContentType('application/json')
                ->setJSON(['error' => 'Error al actualizar el campus']);
        }

        return $this->response->setStatusCode(200)
            ->setContentType('application/json')
            ->setJSON(['message' => 'Campus actualizado exitosamente']);
    }

    public function deleteCampus()
    {
        $id = $this->request->getPost('id');
        $nombre = $this->request->getPost('nombre');


        $result = $this->campusModel->deleteCampus($id, $nombre);

        if ($result === false) {
            return $this->response->setStatusCode(500)
                ->setContentType('application/json')
                ->setJSON(['error' => 'Error al eliminar el campus']);
        }

        if (is_string($result)) {
            return $this->response->setStatusCode(400)
                ->setContentType('application/json')
                ->setJSON(['error' => $result]);
        }

        return $this->response->setStatusCode(200)
            ->setContentType('application/json')
            ->setJSON(['message' => 'Campus eliminado exitosamente']);
    }
}
