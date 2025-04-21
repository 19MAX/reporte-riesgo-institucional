<?php

namespace App\Models;

use CodeIgniter\Model;
use Exception;

class CampusModel extends Model
{
    protected $table = 'campus';
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


    /**
     * Obtener todos los campus
     */
    public function getCampus()
    {
        try {
            return $this->findAll();
        } catch (\Exception $e) {
            log_message('error', 'Error al obtener todos los campus: ' . $e->getMessage());
            return false;
        }
    }

    public function getAllCampus($id)
    {
        try {
            return $this->where('id_sede', $id)->findAll();
        } catch (Exception $e) {
            throw new Exception("Error al obtener campus: " . $e->getMessage());
        }
    }


    /**
     * Obtener campus por ID de sede
     */
    public function getCampusBySede($id_sede)
    {
        try {
            return $this->where('id_sede', $id_sede)->findAll();
        } catch (\Exception $e) {
            log_message('error', 'Error al obtener campus por sede: ' . $e->getMessage());
            return false;
        }
    }

    /**
     * Insertar un nuevo campus
     */
    public function insertCampus($data)
    {
        try {
            $this->db->transStart();

            $this->insert($data);

            $this->db->transComplete();

            if ($this->db->transStatus() === false) {
                return false;
            }

            return true;
        } catch (\Exception $e) {
            log_message('error', 'Error al insertar campus: ' . $e->getMessage());
            return false;
        }
    }

    /**
     * Actualizar un campus existente
     */
    public function updateCampus($id_campus, $data)
    {
        try {
            $this->db->transStart();

            $this->update($id_campus, $data);

            $this->db->transComplete();

            if ($this->db->transStatus() === false) {
                return false;
            }

            return true;
        } catch (\Exception $e) {
            log_message('error', 'Error al actualizar campus: ' . $e->getMessage());
            return false;
        }
    }

    /**
     * Eliminar un campus
     */
    public function deleteCampus($id_campus, $nombre = null)
    {
        try {
            $this->db->transStart();

            // Verificar si el campus existe
            $campus = $this->find($id_campus);

            if (!$campus) {
                throw new \Exception("El campus no existe");
            }

            if ($nombre !== null && $campus['nombre'] != $nombre) {
                throw new \Exception("El nombre del campus no coincide");
            }

            $this->delete($id_campus);

            $this->db->transComplete();

            if ($this->db->transStatus() === false) {
                return false;
            }

            return true;
        } catch (\PDOException $e) {
            $this->db->transRollback();

            // Manejar violación de clave foránea
            if ($e->getCode() == 23000 && strpos($e->getMessage(), '1451') !== false) {
                return "El campus no se puede eliminar porque existen dependencias que lo usan.";
            }

            log_message('error', 'Error al eliminar campus: ' . $e->getMessage());
            return false;
        } catch (\Exception $e) {
            $this->db->transRollback();
            log_message('error', 'Error: ' . $e->getMessage());
            return false;
        }
    }
}
