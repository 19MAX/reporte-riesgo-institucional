<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AuthModel;

class AuthController extends BaseController
{
    protected $authModel;

    private function redirectView($validation = null, $flashMessages = null, $last_data = null)
    {
        return redirect()->to('login')->
            with('flashValidation', isset($validation) ? $validation->getErrors() : null)->
            with('flashMessages', $flashMessages)->
            with('last_data', $last_data);
    }

    public function __construct()
    {
        $this->authModel = new AuthModel();
    }

    public function index()
    {

        $flashValidation = session()->getFlashdata('flashValidation');
        $flashMessages = session()->getFlashdata('flashMessages');
        $last_data = session()->getFlashdata('last_data');

        $data = [
            'last_data' => $last_data,
            'validation' => $flashValidation,
            'flashMessages' => $flashMessages,
        ];
        $accessGranted = grantAccess();
        if ($accessGranted)
            return $accessGranted;
        return view('auth/login', $data);
    }

    public function login()
    {
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');
        $authModel = new AuthModel();
        $data = [
            'email' => trim($email),
            'password' => trim($password)
        ];
        try {

            $validation = \Config\Services::validation();
            $validation->setRules(
                [
                    'email' => [
                        'label' => 'Correo electrónico',
                        'rules' => 'required|valid_email',
                    ],
                    'password' => [
                        'label' => 'Contraseña',
                        'rules' => 'required|min_length[4]',
                    ],
                ]
            );
            if ($validation->run($data)) {

                // Buscar al usuario por su correo electrónico
                $user = $authModel->where('email', $email)->first();
                if ($user) {
                    // Verificar la contraseña
                    if (password_verify($password, $user['password'])) {
                        // Iniciar sesión exitosa
                        $session = session();
                        $session->set([
                            'id' => $user['id'],
                            'cedula' => $user['cedula'],
                            'nombres' => $user['nombres'],
                            'apellidos' => $user['apellidos'],
                            'email' => $user['email'],
                            'rol' => $user['rol'],
                            'id_campus' => $user['id_campus']
                        ]);

                        // Redirigir al usuario según su rol
                        switch ($user['rol_id']) {
                            case (1):
                                return redirect('admin');
                            case (2):
                                return redirect('supervisor');
                            case (3):
                                return redirect('analista');
                            // case RolesOptions::UsuarioPublico:
                            //     return redirect('public/dashboard');
                            default:
                                return redirect('login');
                        }
                    } else {
                        return $this->redirectView(null, [['Contraseña incorrecta', 'danger']], $data);
                    }
                } else {
                    return $this->redirectView(null, [['Correo electrónico no registrado', 'danger']], $data);
                }
            } else {
                return $this->redirectView($validation, [['Error en los datos enviados', 'warning']], $data);
            }
        } catch (\Exception $e) {
            return $this->redirectView(null, [['Error en los datos enviados', 'danger']], $data);
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to(base_url('login'));
    }
}
