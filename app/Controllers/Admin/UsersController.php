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

    public function updatePassword()
    {
        try {
            // Obtener datos POST
            $id = $this->request->getPost('id');
            $newPassword = $this->request->getPost('newPassword');

            // Validación
            $validation = \Config\Services::validation();
            $validation->setRules([
                'id' => [
                    'label' => 'Id',
                    'rules' => 'required|numeric',
                ],
                'newPassword' => [
                    'label' => 'Nueva contraseña',
                    'rules' => 'required|min_length[6]',
                ]
            ]);

            $data = [
                'id' => $id,
                'newPassword' => $newPassword
            ];

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

            // Hashear la nueva contraseña
            $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);

            // Actualizar solo la contraseña
            if ($this->usersModel->update($id, ['password' => $hashedPassword])) {
                return $this->response
                    ->setStatusCode(200)
                    ->setJSON([
                        'success' => true,
                        'message' => 'Contraseña actualizada correctamente.',
                    ]);
            } else {
                return $this->response
                    ->setStatusCode(500)
                    ->setJSON([
                        'success' => false,
                        'error' => 'Error al actualizar la contraseña.',
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
            $rol = trim($this->request->getPost('rol'));
            $id_campus = $this->request->getPost('id_campus');
            $id_instituto = $this->request->getPost('id_instituto');

            // Preparar datos iniciales del usuario
            $userData = [
                'email' => $email,
                'password' => $password,
                'nombres' => $nombres,
                'apellidos' => $apellidos,
                'cedula' => $cedula,
                'rol' => $rol,
            ];

            // Agregar id_campus solo si no es supervisor (rol 2)
            if ($rol != '2' && !empty($id_campus)) {
                $userData['id_campus'] = $id_campus;
            }

            // Validación base para todos los campos comunes
            $rules = [
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
            ];

            // Agregar reglas específicas según el rol
            if ($rol == '2') { // Supervisor
                $rules['id_instituto'] = [
                    'label' => 'Instituto',
                    'rules' => 'required|numeric|is_not_unique[IES.id]',
                ];
            } else if ($rol == '3' || $rol == '4') { // Analista o Lector
                $rules['id_campus'] = [
                    'label' => 'Campus',
                    'rules' => 'required|numeric|is_not_unique[campus.id]',
                ];
            }

            // Validar datos
            $validation = \Config\Services::validation();
            $validation->setRules($rules);

            $validData = [
                'cedula' => $cedula,
                'nombres' => $nombres,
                'apellidos' => $apellidos,
                'email' => $email,
                'password' => $password,
                'rol' => $rol,
                'id_campus' => $id_campus,
                'id_instituto' => $id_instituto,
            ];

            if (!$validation->run($validData)) {
                return $this->response
                    ->setStatusCode(422)
                    ->setJSON([
                        'success' => false,
                        'message' => 'Error de validación',
                        'errors' => $validation->getErrors(),
                    ]);
            }

            // Encriptar contraseña antes de guardar
            $userData['password'] = password_hash($userData['password'], PASSWORD_DEFAULT);

            // Iniciar transacción
            $db = \Config\Database::connect();
            $db->transStart();

            try {
                // Insertar usuario
                $userInserted = $this->usersModel->insert($userData);

                if (!$userInserted) {
                    throw new \Exception('Error al insertar el usuario');
                }

                // Si es supervisor, insertar relación con instituto
                if ($rol == '2' && !empty($id_instituto)) {
                    $usuarioInstitutoModel = model('UsuarioInstitutoModel'); // Asegúrate de tener este modelo
                    $existingSupervisor = $usuarioInstitutoModel
                        ->select('usuario_instituto.id')
                        ->join('users', 'users.id = usuario_instituto.id_usuario')
                        ->where('usuario_instituto.id_instituto', $id_instituto)
                        ->where('users.rol', '2')
                        ->first();

                    if ($existingSupervisor) {
                        // Ya existe un supervisor para ese instituto
                        $db->transRollback(); // Cancelar la transacción que inició antes
                        return $this->response
                            ->setStatusCode(409) // Conflicto
                            ->setJSON([
                                'success' => false,
                                'message' => 'Ya existe un usuario supervisor asignado a este instituto.',
                            ]);
                    }

                    // No existe, se procede a insertar
                    $institutoData = [
                        'id_usuario' => $userInserted,
                        'id_instituto' => $id_instituto
                    ];

                    $institutoInserted = $usuarioInstitutoModel->insert($institutoData);

                    if (!$institutoInserted) {
                        throw new \Exception('Error al asociar usuario con instituto');
                    }
                }
                if ($rol == '3' && !empty($id_campus)) {
                    $existingAnalyst = $this->usersModel
                        ->where('id_campus', $id_campus)
                        ->where('rol', '3')
                        ->first();

                    if ($existingAnalyst) {
                        $db->transRollback();
                        return $this->response
                            ->setStatusCode(409)
                            ->setJSON([
                                'success' => false,
                                'message' => 'Ya existe un usuario analista asignado a este campus.',
                            ]);
                    }
                }

                // Confirmar transacción
                $db->transComplete();

                return $this->response
                    ->setStatusCode(201)
                    ->setJSON([
                        'success' => true,
                        'message' => 'Usuario registrado correctamente.',
                        'user_id' => $userInserted
                    ]);

            } catch (\Exception $e) {
                // Revertir transacción en caso de error
                $db->transRollback();

                return $this->response
                    ->setStatusCode(500)
                    ->setJSON([
                        'success' => false,
                        'message' => 'Error al registrar el usuario.',
                        'error' => $e->getMessage()
                    ]);
            }

        } catch (\Exception $e) {
            return $this->response
                ->setStatusCode(500)
                ->setJSON([
                    'success' => false,
                    'message' => 'Error interno del servidor',
                    'error' => $e->getMessage(),
                ]);
        }
    }
}
