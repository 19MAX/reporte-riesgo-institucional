<?php

namespace App\Models;

use CodeIgniter\Model;

class UsersModel extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $protectFields = false;
    protected $allowedFields = [];

    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged = true;

    protected array $casts = [];
    protected array $castHandlers = [];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat = 'datetime';
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    protected $deletedField = 'deleted_at';

    // Validation
    protected $validationRules = [];
    protected $validationMessages = [];
    protected $skipValidation = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = false;
    protected $beforeInsert = [];
    protected $afterInsert = [];
    protected $beforeUpdate = [];
    protected $afterUpdate = [];
    protected $beforeFind = [];
    protected $afterFind = [];
    protected $beforeDelete = [];
    protected $afterDelete = [];


    public function getAllUsers()
    {
        return $this->findAll();
    }

    public function getAllUsersWithoutPassword()
    {
        return $this->select('id, cedula, nombres, apellidos, email, rol')
            ->findAll();
    }

    public function getUserDataByEmail($email)
    {
        return $this->where('email', $email)->first();
    }

    public function getUserData()
    {
        $session = session();
        $userData = $session->get('user_session');

        if (!$userData || !isset($userData['user_id'])) {
            return null;
        }

        return $this->find($userData['user_id']);
    }

    public function encriptarPassword($password)
    {
        return password_hash($password, PASSWORD_BCRYPT, ['cost' => 10]);
    }

    public function resetPassword($userId, $newPassword)
    {
        $data = [
            'password' => $this->encriptarPassword($newPassword)
        ];

        return $this->update($userId, $data);
    }

    public function login($email, $password)
    {
        $user = $this->where('email', $email)->first();

        if ($user && password_verify($password, $user['password'])) {
            return $this->select('rol, id as user_id, email, nombres, apellidos, cedula')
                ->where('email', $email)
                ->first();
        }

        return false;
    }

    public function registrarUsuario($data)
    {
        $db = \Config\Database::connect();
        $db->transStart();

        try {
            // Preparar los datos para el usuario
            $userData = [
                'email' => $data['email'],
                'password' => $this->encriptarPassword($data['password']),
                'nombres' => $data['nombres'],
                'apellidos' => $data['apellidos'],
                'cedula' => $data['cedula'],
                'id_campus' => $data['id_campus'] ?? null,
                'rol' => $data['rol']
            ];

            // Insertar el usuario
            $userId = $this->insert($userData);

            if (!$userId) {
                throw new \Exception('No se pudo insertar el usuario.');
            }

            // Si es supervisor y tiene id_instituto, crear la relación
            if ($data['rol'] == "2" && isset($data['id_instituto'])) {
                $builder = $db->table('usuario_instituto');
                $institutoData = [
                    'id_usuario' => $userId,
                    'id_instituto' => $data['id_instituto']
                ];

                if (!$builder->insert($institutoData)) {
                    throw new \Exception('No se pudo asignar el instituto al supervisor.');
                }
            }

            $db->transComplete();

            if ($db->transStatus() === false) {
                throw new \Exception('Error en la transacción.');
            }

            return ['success' => true];

        } catch (\Exception $e) {
            $db->transRollback();

            // Verificar si es un error de cédula duplicada
            if (strpos($e->getMessage(), 'Duplicate entry') !== false && strpos($e->getMessage(), 'cedula') !== false) {
                return ['success' => false, 'message' => 'Cédula duplicada.'];
            }

            return ['success' => false, 'message' => $e->getMessage()];
        }
    }

    public function updateUser($id, $data)
    {
        // Verificar si el usuario existe
        if (!$this->find($id)) {
            throw new \Exception('El usuario no existe.');
        }

        // Actualizar los datos
        return $this->update($id, $data);
    }

    public function deleteUser($id)
    {
        if ($id == 1) {
            throw new \Exception('No se puede eliminar al administrador');
        }

        try {
            if ($this->delete($id)) {
                return true;
            } else {
                throw new \Exception('No se ha podido eliminar el usuario');
            }
        } catch (\Exception $e) {
            // Manejo de excepciones para violaciones de clave foránea
            $message = $e->getMessage();

            if (strpos($message, 'usuario_instituto_ibfk_1') !== false) {
                throw new \Exception('No se puede eliminar al usuario porque está asociado a un instituto.');
            } elseif (strpos($message, 'fk_id_analista') !== false) {
                throw new \Exception('No se puede eliminar al usuario porque está asociado a registros de seguridad administrativa.');
            } elseif (strpos($message, '23000') !== false) {
                throw new \Exception('No se puede eliminar al usuario debido a restricciones de integridad referencial.');
            }

            throw $e;
        }
    }

    public function obtenerAnalistas()
    {
        return $this->select('id, nombres, apellidos, rol')
            ->where('rol', 3)
            ->findAll();
    }

    public function obtenerIdCampus($idAnalista)
    {
        $result = $this->select('id_campus')
            ->where('rol', 3)
            ->where('id', $idAnalista)
            ->first();

        return $result ? $result['id_campus'] : null;
    }

    public function asignarUsuarioACampus($idUsuario, $idCampus)
    {
        // Verificar si ya existe un usuario con rol 3 para este campus
        $existingUser = $this->where('id_campus', $idCampus)
            ->where('rol', 3)
            ->countAllResults();

        if ($existingUser > 0) {
            return false;
        }

        // Asignar el campus al usuario
        return $this->where('id', $idUsuario)
            ->where('rol', 3)
            ->set('id_campus', $idCampus)
            ->update();
    }
}