<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\UsersModel;
use CodeIgniter\HTTP\ResponseInterface;
use ModulosAdmin;

class UsersController extends BaseController
{
    protected $usersModel;

    public function __construct()
    {
        $this->usersModel = new UsersModel();
    }

    public function index()
    {
        $data = [
            "modulo" => ModulosAdmin::USERS,
        ];

        return view("admin/users/index", $data);
    }
    public function add()
    {
        $data = [
            "modulo" => ModulosAdmin::USERS,
        ];

        return view("admin/users/agregar", $data);
    }

    public function getUsers()
    {
        $data = $this->usersModel->getAllUsers();

        if ($data === false || empty($data)) {
            return $this->respond(null, 204);
        } else {
            return $this->respond($data, 200);
        }
    }

    public function getUserData()
    {
        $data = $this->usersModel->getUserData();

        if ($data === false || empty($data)) {
            return $this->respond(null, 204);
        } else {
            return $this->respond($data, 200);
        }
    }

    public function getAllUsers()
    {

        $data = $this->usersModel->getAllUsers();

        if ($data === false || empty($data)) {
            return $this->respond(null, 204);
        } else {
            return $this->respond($data, 200);
        }
    }

    public function getAllUsersWithoutPassword()
    {

        $data = $this->usersModel->getAllUsersWithoutPassword();

        return $this->response->setJSON($data);
    }

    public function asignarUsuarioACampus()
    {
        try {
            $id_usuario = $this->request->getPost('id_user');
            $id_campus = $this->request->getPost('id_campus');

            // Validaciones
            if (empty($id_usuario)) {
                throw new \Exception("El ID es requerido.");
            }
            if (empty($id_campus)) {
                throw new \Exception("El id del campus es requerido.");
            }

            $userExists = $this->usersModel->find($id_usuario);
            if (!$userExists) {
                throw new \Exception("El usuario no existe.");
            }

            $data = $this->usersModel->asignarUsuarioACampus($id_usuario, $id_campus);
            if ($data) {
                return $this->respond($data, 200);
            } else {
                return $this->respond(['error' => 'Error al actualizar los datos'], 204);
            }
        } catch (\Exception $e) {
            return $this->failValidationError($e->getMessage());
        }
    }

    public function updateUser()
    {
        try {
            // Obtener datos POST
            $id = $this->request->getPost('id');
            $cedula = trim($this->request->getPost('cedula'));
            $nombres = trim($this->request->getPost('nombres'));
            $apellidos = trim($this->request->getPost('apellidos'));
            $email = $this->request->getPost('email');
            $rol = trim($this->request->getPost('rol'));

            $data = [
                'id' => $id,
                'cedula' => $cedula,
                'nombres' => $nombres,
                'apellidos' => $apellidos,
                'email' => $email,
                'rol' => $rol,
            ];

            // Validación
            $validation = \Config\Services::validation();
            $validation->setRules([
                'id' => [
                    'label' => 'Id',
                    'rules' => 'required|numeric',
                ],
                'cedula' => [
                    'label' => 'Número de cédula',
                    'rules' => "required|numeric|max_length[10]|is_unique[users.cedula,id,{$id}]",
                ],
                'nombres' => [
                    'label' => 'Nombres',
                    'rules' => 'required|min_length[3]',
                ],
                'apellidos' => [
                    'label' => 'Apellidos',
                    'rules' => 'required|min_length[3]',
                ],
                'email' => [
                    'label' => 'Correo electrónico',
                    'rules' => 'required|valid_email',
                ],
                'rol' => [
                    'label' => 'Rol',
                    'rules' => 'required|in_list[1,2,3,4]',
                ]
            ]);

            if (!$validation->run($data)) {
                return $this->response
                    ->setStatusCode(422)
                    ->setJSON([
                        'success' => false,
                        'errors' => $validation->getErrors(),
                    ]);
            }

            // Verificar que el usuario exista
            $userExists = $this->usersModel->find($id);
            if (!$userExists) {
                return $this->response
                    ->setStatusCode(404)
                    ->setJSON([
                        'error' => 'El usuario no existe.',
                    ]);
            }

            // Actualizar
            if ($this->usersModel->update($id, $data)) {
                return $this->response
                    ->setStatusCode(200)
                    ->setJSON([
                        'success' => true,
                        'message' => 'Usuario actualizado correctamente.',
                    ]);
            } else {
                return $this->response
                    ->setStatusCode(500)
                    ->setJSON([
                        'success' => false,
                        'error' => 'Error al actualizar los datos.',
                    ]);
            }

        } catch (\Exception $e) {
            return $this->response
                ->setStatusCode(500)
                ->setJSON([
                    'error' => 'Error interno: ' . $e->getMessage(),
                ]);
        }
    }

    public function deleteUsers()
    {
        try {
            // Obtener datos POST
            $id = $this->request->getPost('id');

            // Validación
            $validation = \Config\Services::validation();
            $validation->setRules([
                'id' => [
                    'label' => 'Id',
                    'rules' => 'required|numeric',
                ],
            ]);

            $data = ['id' => $id];

            if (!$validation->run($data)) {
                return $this->response
                    ->setStatusCode(422)
                    ->setJSON([
                        'success' => false,
                        'errors' => $validation->getErrors(),
                    ]);
            }

            // Verificar que el usuario exista
            $userExists = $this->usersModel->find($id);
            if (!$userExists) {
                return $this->response
                    ->setStatusCode(404)
                    ->setJSON([
                        'error' => 'El usuario no existe.',
                    ]);
            }

            // Eliminar usuario
            if ($this->usersModel->deleteUser($id)) {
                return $this->response
                    ->setStatusCode(200)
                    ->setJSON([
                        'success' => true,
                        'message' => 'Usuario eliminado correctamente.',
                    ]);
            } else {
                return $this->response
                    ->setStatusCode(500)
                    ->setJSON([
                        'success' => false,
                        'error' => 'Error al eliminar los datos.',
                    ]);
            }

        } catch (\Exception $e) {
            return $this->response
                ->setStatusCode(500)
                ->setJSON([
                    'error' => 'Error interno: ' . $e->getMessage(),
                ]);
        }
    }


    public function cambiarPass()
    {
        try {
            $id_user = $this->request->getPost('id_user');
            $pass = $this->request->getPost('pass');

            if ($this->usersModel->resetPassword($id_user, $pass)) {
                return $this->respond(['success' => true], 200);
            } else {
                return $this->respond(['error' => 'Error al cambiar la contraseña'], 204);
            }
        } catch (\Exception $e) {
            return $this->failValidationError($e->getMessage());
        }
    }

    public function registrar()
    {
        try {
            // Obtener datos POST
            $email = trim($this->request->getPost('email'));
            $password = $this->request->getPost('password');
            $nombres = trim($this->request->getPost('nombres'));
            $apellidos = trim($this->request->getPost('apellidos'));
            $cedula = trim($this->request->getPost('cedula'));
            $id_campus = $this->request->getPost('id_campus');
            $rol = trim($this->request->getPost('rol'));

            $data = [
                'email' => $email,
                'password' => $password,
                'nombres' => $nombres,
                'apellidos' => $apellidos,
                'cedula' => $cedula,
                'id_campus' => $id_campus,
                'rol' => $rol,
            ];

            // Validación
            $validation = \Config\Services::validation();
            $validation->setRules([
                'cedula' => [
                    'label' => 'Número de cédula',
                    'rules' => 'required|numeric|max_length[10]|is_unique[users.cedula]',
                ],
                'nombres' => [
                    'label' => 'Nombres',
                    'rules' => 'required|min_length[3]',
                ],
                'apellidos' => [
                    'label' => 'Apellidos',
                    'rules' => 'required|min_length[3]',
                ],
                'email' => [
                    'label' => 'Correo electrónico',
                    'rules' => 'required|valid_email|is_unique[users.email]',
                ],
                'password' => [
                    'label' => 'Contraseña',
                    'rules' => 'required|min_length[6]',
                ],
                'rol' => [
                    'label' => 'Rol',
                    'rules' => 'required|in_list[1,2,3,4]',
                ],
                'id_campus' => [
                    'label' => 'Campus',
                    'rules' => 'permit_empty|numeric',
                ],
            ]);

            if (!$validation->run($data)) {
                return $this->response
                    ->setStatusCode(422)
                    ->setJSON([
                        'success' => false,
                        'errors' => $validation->getErrors(),
                    ]);
            }

            // Encriptar contraseña antes de guardar
            $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

            // Registrar usuario
            $resultado = $this->usersModel->insert($data);

            if ($resultado) {
                return $this->response
                    ->setStatusCode(201)
                    ->setJSON([
                        'success' => true,
                        'message' => 'Usuario registrado correctamente.',
                        'user_id' => $resultado
                    ]);
            } else {
                return $this->response
                    ->setStatusCode(500)
                    ->setJSON([
                        'success' => false,
                        'error' => 'Error al registrar el usuario.',
                        'db_errors' => $this->usersModel->errors()
                    ]);
            }
        } catch (\Exception $e) {
            return $this->response
                ->setStatusCode(500)
                ->setJSON([
                    'success' => false,
                    'error' => 'Error interno: ' . $e->getMessage(),
                ]);
        }
    }
}
