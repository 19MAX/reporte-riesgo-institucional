<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class CsrfController extends BaseController
{
    public function getNewCsrfToken()
    {
        return $this->response->setJSON([
            'csrfName' => csrf_token(),
            'csrfHash' => csrf_hash()
        ]);
    }
}
