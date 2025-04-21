<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\FichasModel;
use App\Models\UsersModel;
use CodeIgniter\HTTP\ResponseInterface;
use ModulosAdmin;

class FichasController extends BaseController
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
        /* $id_campus = $this->usersModel->obtenerIdCampus($id);
        $message = [
            "message" => "NO EXISTE EL CAMPUS",
        ];
        if (!$id_campus) {
            return view("errors/html/error_404", $message);
        } */

        $data = [
            "id_ficha" => $id,
            "modulo" => ModulosAdmin::FICHAS,
        ];

        return view("admin/pdf/index", $data);
    }

}
