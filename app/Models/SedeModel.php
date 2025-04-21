<?php

namespace App\Models;

use CodeIgniter\Model;
use Exception;

class SedeModel extends Model
{
    protected $table = 'sede';
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

    public function getAllSedes($id)
    {
        try {
            return $this->where('id_IES', $id)->findAll();
        } catch (Exception $e) {
            throw new Exception("Error al obtener sedes: " . $e->getMessage());
        }
    }

    public function insertSede($id_ies, $nombre, $direccion)
    {
        try {
            $this->db->transStart();

            $data = [
                'nombre' => $nombre,
                'id_ies' => $id_ies,
                'direccion' => $direccion
            ];

            $this->insert($data);

            $this->db->transComplete();

            if ($this->db->transStatus() === false) {
                throw new Exception("Error al insertar la sede.");
            }

            return "Los datos se han insertado correctamente en la tabla sedes.";
        } catch (Exception $e) {
            return "Error al insertar datos en la base de datos: " . $e->getMessage();
        }
    }

    public function updateSede($id_sede, $nombre, $direccion)
    {
        try {
            $this->db->transStart();

            $data = [
                'nombre' => $nombre,
                'direccion' => $direccion
            ];

            $this->update($id_sede, $data);

            $this->db->transComplete();

            if ($this->db->transStatus() === false) {
                throw new Exception("Error al actualizar la sede.");
            }

            return true;
        } catch (Exception $e) {
            return "Error al actualizar datos en la base de datos: " . $e->getMessage();
        }
    }

    public function deleteSede($id, $nombre)
    {
        try {
            $this->db->transStart();

            // Verificar si la sede existe
            $sede = $this->where(['id' => $id, 'nombre' => $nombre])->first();

            if (!$sede) {
                throw new Exception("La sede no existe o el nombre es incorrecto.");
            }

            // Intentar eliminar la sede
            $deleted = $this->where(['id' => $id, 'nombre' => $nombre])->delete();

            if (!$deleted) {
                throw new Exception("Error al eliminar la sede.");
            }

            $this->db->transComplete();

            if ($this->db->transStatus() === false) {
                throw new Exception("Error al completar la transacción.");
            }

            return true;
        } catch (Exception $e) {
            // Manejar la violación de restricción de clave foránea
            if (strpos($e->getMessage(), '1451') !== false) {
                return "La sede no se puede eliminar porque ya existen campus creados.";
            }
            return "Error al eliminar la sede: " . $e->getMessage();
        }
    }
}
