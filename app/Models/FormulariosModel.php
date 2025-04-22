<?php

namespace App\Models;

use CodeIgniter\Model;

class FormulariosModel extends Model
{
    protected $db;

    public function __construct()
    {
        parent::__construct();
        $this->db = \Config\Database::connect();
    }

    public function getFichasAll()
    {
        try {
            $builder = $this->db->table('users u');
            $builder->select('
                u.id AS id_usuario,
                CONCAT(u.nombres, " ", u.apellidos) AS nombre_usuario,
                c.nombre AS nombre_campus,
                s.nombre AS nombre_sede,
                i.nombre AS nombre_ies,
                f.id AS id_ficha
            ')
                ->join('seguridad_estructural se', 'se.id_analista = u.id', 'inner')
                ->join('seguridad_no_estructural sne', 'sne.id_analista = u.id', 'inner')
                ->join('seguridad_funcional sf', 'sf.id_analista = u.id', 'inner')
                ->join('seguridad_administrativa sa', 'sa.id_analista = u.id', 'inner')
                ->join('fichas f', 'f.id_sa = sa.id AND f.id_sf = sf.id AND f.id_sne = sne.id AND f.id_se = se.id', 'inner')
                ->join('campus c', 'f.id_campus = c.id', 'inner')
                ->join('sede s', 'c.id_sede = s.id', 'inner')
                ->join('IES i', 's.id_IES = i.id', 'inner')
                ->distinct();

            $query = $builder->get();
            return $query->getResultArray();

        } catch (\Exception $e) {
            log_message('error', $e->getMessage());
            return false;
        }
    }

    public function getFichasByUserId($userId)
    {
        try {
            $builder = $this->db->table('users u');
            $builder->select('
                CONCAT(u.nombres, " ", u.apellidos) AS nombre_usuario,
                c.nombre AS nombre_campus,
                s.nombre AS nombre_sede,
                i.nombre AS nombre_ies,
                DATE(f.fecha) AS fecha_ficha
            ')
                ->join('seguridad_estructural se', 'se.id_analista = u.id', 'inner')
                ->join('seguridad_no_estructural sne', 'sne.id_analista = u.id', 'inner')
                ->join('seguridad_funcional sf', 'sf.id_analista = u.id', 'inner')
                ->join('seguridad_administrativa sa', 'sa.id_analista = u.id', 'inner')
                ->join('fichas f', 'f.id_sa = sa.id AND f.id_sf = sf.id AND f.id_sne = sne.id AND f.id_se = se.id', 'inner')
                ->join('campus c', 'f.id_campus = c.id', 'inner')
                ->join('sede s', 'c.id_sede = s.id', 'inner')
                ->join('IES i', 's.id_IES = i.id', 'inner')
                ->where('u.id', $userId);

            $query = $builder->get();
            return $query->getResultArray();

        } catch (\Exception $e) {
            log_message('error', $e->getMessage());
            return false;
        }
    }

}