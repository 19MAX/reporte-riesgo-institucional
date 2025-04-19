<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;


class UsersController extends BaseController
{
    protected $format = 'json';
    protected $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    public function index()
    {
        $users = $this->userModel->getAllUsersWithoutPassword();
        return $this->respond($users);
    }

    public function getUserData()
    {
        $userId = session()->get('user_session')['user_id'];
        $userData = $this->userModel->getUserData($userId);

        if (!$userData) {
            return $this->failNotFound('Usuario no encontrado');
        }

        return $this->respond($userData);
    }

    public function update($id = null)
    {
        $rules = [
            'email' => 'required|valid_email',
            'nombres' => 'required',
            'apellidos' => 'required',
            'rol' => 'required',
            'cedula' => 'required'
        ];

        if (!$this->validate($rules)) {
            return $this->failValidationErrors($this->validator->getErrors());
        }

        $data = $this->request->getPost();
        
        if (!$this->userModel->update($id, $data)) {
            return $this->fail($this->userModel->errors());
        }

        return $this->respond(['status' => 'success', 'message' => 'Usuario actualizado correctamente']);
    }

    public function delete($id = null)
    {
        if ($id == 1) {
            return $this->fail('No se puede eliminar al administrador');
        }

        try {
            if ($this->userModel->delete($id)) {
                return $this->respondDeleted(['status' => 'success', 'message' => 'Usuario eliminado correctamente']);
            }
        } catch (\Exception $e) {
            return $this->fail('No se puede eliminar el usuario debido a registros relacionados');
        }

        return $this->fail('Error al eliminar el usuario');
    }

    public function login()
    {
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        $userData = $this->userModel->authenticateUser($email, $password);

        if ($userData) {
            session()->set('user_session', $userData);
            return $this->respond($userData);
        }

        return $this->failUnauthorized('Usuario o contraseña incorrectos');
    }

    public function register()
    {
        $data = $this->request->getPost();
        $result = $this->userModel->registrarUsuario($data);

        if ($result['success']) {
            return $this->respondCreated($result);
        }

        return $this->fail($result['message']);
    }

    public function asignarCampus()
    {
        $idUser = $this->request->getPost('id_user');
        $idCampus = $this->request->getPost('id_campus');

        if (!$idUser || !$idCampus) {
            return $this->fail('ID de usuario y campus son requeridos');
        }

        $result = $this->userModel->asignarUsuarioACampus($idUser, $idCampus);

        if ($result) {
            return $this->respond(['status' => 'success']);
        }

        return $this->fail('No se pudo asignar el usuario al campus');
    }

    public function cambiarPassword()
    {
        $idUser = $this->request->getPost('id_user');
        $password = $this->request->getPost('pass');

        if (!$idUser || !$password) {
            return $this->fail('ID de usuario y contraseña son requeridos');
        }

        if ($this->userModel->resetPassword($idUser, $password)) {
            return $this->respond(['status' => 'success']);
        }

        return $this->fail('Error al cambiar la contraseña');
    }
}
