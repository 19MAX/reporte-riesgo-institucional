<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class AdminController extends BaseController
{
    public function index()
    {

        $data['modulo'] = $this->request->getGet('modulo') ?? 'home';

        return view('admin/dashboard',$data);
    }
}
