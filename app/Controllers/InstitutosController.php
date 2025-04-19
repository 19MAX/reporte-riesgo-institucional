<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\InstitutoModel;
use CodeIgniter\HTTP\ResponseInterface;

class InstitutosController extends BaseController
{
    protected $institutoModel;

    public function __construct()
    {
        $this->institutoModel = new InstitutoModel();
    }

    public function index()
    {
        //
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
            $data = $this->request->getPost();
            $logo = $this->request->getFile('logo');

            $this->institutoModel->insertarInstituto($data, $logo);

            return $this->response->setJSON(['message' => 'Instituto insertado correctamente'])
                                  ->setStatusCode(ResponseInterface::HTTP_CREATED);
        } catch (Exception $e) {
            return $this->response->setStatusCode(400)->setJSON(['error' => $e->getMessage()]);
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
        } catch (Exception $e) {
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
