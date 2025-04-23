<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\FichasModel;
use App\Models\FormulariosModel;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\RESTful\ResourceController;
use ModulosAdmin;

class FichasController extends ResourceController
{

    protected $formularioModel;
    protected $fichasModel;

    public function __construct()
    {
        $this->formularioModel = new FormulariosModel();
        $this->fichasModel = new FichasModel();
    }

    public function index()
    {

        $data = [
            "modulo" => ModulosAdmin::FICHAS,
        ];

        return view("admin/fichas/index", $data);
    }

    public function getFichasAll()
    {
        $data = $this->formularioModel->getFichasAll();

        if (empty($data)) {
            return $this->failNotFound('No se encontraron fichas.');
        }

        return $this->respond($data);
    }

    public function getFichaUser()
    {
        $id = $this->request->getGet('id');

        if (!$id) {
            return $this->fail('Parámetro requerido: id', 400);
        }

        $data = $this->model->getFichasByUserId($id);

        if (empty($data)) {
            return $this->failNotFound('No se encontraron fichas para este usuario.');
        }

        return $this->respond($data);
    }

    public function getFichaDetalle($id_ficha)
    {

        $data = $this->fichasModel->getFichaDetalle($id_ficha);

        if (empty($data)) {
            return $this->failNotFound('No se encontró el detalle de la ficha.');
        }

        return $this->respond($data);
    }

    public function getCampus()
    {
        $searchTerm = $this->request->getGet('q');
        $page = $this->request->getGet('page') ?? 1;
        $limit = 10; // Cantidad de resultados por página
        $offset = ($page - 1) * $limit;

        $db = \Config\Database::connect();
        $builder = $db->table('campus c');

        // Joins para obtener información de usuarios relacionados con campus
        $builder->select('c.*, u.id as user_id, u.nombres, u.apellidos, u.email')
            ->join('users u', 'u.id_campus = c.id', 'left')
            ->where('u.deleted_at IS NULL');

        // Filtro por término de búsqueda
        if ($searchTerm) {
            $builder->groupStart()
                ->like('c.nombre', $searchTerm)
                ->orLike('c.canton', $searchTerm)
                ->orLike('c.parroquia', $searchTerm)
                ->orLike('c.direccion', $searchTerm)
                ->orLike('u.nombres', $searchTerm)
                ->orLike('u.apellidos', $searchTerm)
                ->groupEnd();
        }

        // Clonar el builder para el conteo total
        $countBuilder = clone $builder;
        $totalCount = $countBuilder->countAllResults();

        // Obtener resultados paginados
        $campus = $builder->limit($limit)->offset($offset)->get()->getResultArray();

        // Organizar datos para mostrar campus con sus usuarios
        $formattedCampus = [];
        foreach ($campus as $item) {
            // Añadir información del usuario al campus
            $campusId = $item['id'];

            if (!isset($formattedCampus[$campusId])) {
                $formattedCampus[$campusId] = [
                    'id' => $campusId,
                    'nombre' => $item['nombre'],
                    'canton' => $item['canton'],
                    'parroquia' => $item['parroquia'],
                    'direccion' => $item['direccion'],
                    'usuarios' => []
                ];
            }

            // Solo agregar información de usuario si existe
            if (!empty($item['user_id'])) {
                $formattedCampus[$campusId]['usuarios'][] = [
                    'id' => $item['user_id'],
                    'nombre_completo' => $item['nombres'] . ' ' . $item['apellidos'],
                    'email' => $item['email']
                ];
            }
        }

        // Convertir a array numérico para Select2
        $response = [
            'total_count' => $totalCount,
            'items' => array_values($formattedCampus)
        ];

        return $this->response->setJSON($response);
    }

    public function select()
    {

        $data = [
            "modulo" => ModulosAdmin::FICHAS,
        ];

        return view("admin/fichas/seleccionar", $data);
    }
}
