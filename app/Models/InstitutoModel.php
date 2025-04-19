<?php

namespace App\Models;

use CodeIgniter\Model;

class InstitutoModel extends Model
{
    protected $table            = 'IES';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = false;
    protected $allowedFields    = [];

    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged = true;

    protected array $casts = [];
    protected array $castHandlers = [];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = false;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    // Obtener todos los registros
    public function getAll()
    {
        return $this->findAll();
    }

    // Obtener por ID
    public function getById($id)
    {
        return $this->find($id);
    }

    // Verificar existencia por id y nombre
    public function existsByIdAndName($id, $nombre)
    {
        return $this->where(['id' => $id, 'nombre' => $nombre])->first();
    }
}
