<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\FichasModel;
use App\Models\FormulariosModel;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\RESTful\ResourceController;
use ModulosAdmin;

class FichasController extends ResourceController
{

    protected $formularioModel;
    protected $fichasModel;

    public function __construct()
    {
        $this->formularioModel = new FormulariosModel();
        $this->fichasModel = new FichasModel();
    }

    public function index()
    {

        $data = [
            "modulo" => ModulosAdmin::FICHAS,
        ];

        return view("admin/fichas/index", $data);
    }

    public function getFichasAll()
    {
        $data = $this->formularioModel->getFichasAll();

        if (empty($data)) {
            return $this->failNotFound('No se encontraron fichas.');
        }

        return $this->respond($data);
    }

    public function getFichaUser()
    {
        $id = $this->request->getGet('id');

        if (!$id) {
            return $this->fail('Parámetro requerido: id', 400);
        }

        $data = $this->model->getFichasByUserId($id);

        if (empty($data)) {
            return $this->failNotFound('No se encontraron fichas para este usuario.');
        }

        return $this->respond($data);
    }

    public function getFichaDetalle($id_ficha)
    {

        $data = $this->fichasModel->getFichaDetalle($id_ficha);

        if (empty($data)) {
            return $this->failNotFound('No se encontró el detalle de la ficha.');
        }

        return $this->respond($data);
    }
}
