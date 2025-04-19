<?php

namespace App\Models;

use CodeIgniter\Model;

class AuthModel extends Model
{
    protected $table            = 'users';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields = ['email', 'password', 'nombres', 'apellidos', 'cedula', 'rol'];
    public function authenticateUser(string $email, string $password)
    {
        $user = $this->where('email', $email)->first();

        if ($user && password_verify($password, $user['password'])) {
            return [
                'user_id' => $user['id'],
                'email' => $user['email'],
                'nombres' => $user['nombres'],
                'apellidos' => $user['apellidos'],
                'cedula' => $user['cedula'],
                'rol' => $user['rol']
            ];
        }

        return false;
    }
}
