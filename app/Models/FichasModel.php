<?php

namespace App\Models;

use CodeIgniter\Model;
use Exception;

class FichasModel extends Model
{
    protected $db;

    public function __construct()
    {
        parent::__construct();
        $this->db = \Config\Database::connect();
    }

    public function insertarTodosDatos($seguridad_estructural, $seguridad_no_estructural, $seguridad_funcional, $seguridad_administrativa)
    {
        try {
            $this->db->transBegin();

            $resultado_estructural = $this->insertarSeguridadEstructural($seguridad_estructural);
            if (!is_array($resultado_estructural) || !array_key_exists('id_se', $resultado_estructural)) {
                $this->db->transRollback();
                return $resultado_estructural;
            }
            $id_se = intval($resultado_estructural['id_se']);

            $resultado_no_estructural = $this->insertarSeguridadNoEstructural($seguridad_no_estructural);
            if (!is_array($resultado_no_estructural) || !array_key_exists('id_sne', $resultado_no_estructural)) {
                $this->db->transRollback();
                return $resultado_no_estructural;
            }
            $id_sne = intval($resultado_no_estructural['id_sne']);

            $resultado_funcional = $this->insertarSeguridadFuncional($seguridad_funcional);
            if (!is_array($resultado_funcional) || !array_key_exists('id_sf', $resultado_funcional)) {
                $this->db->transRollback();
                return $resultado_funcional;
            }
            $id_sf = intval($resultado_funcional['id_sf']);
            $id_campus = intval($resultado_funcional['id_campus']);

            $resultado_administrativa = $this->insertarSeguridadAdministrativa($seguridad_administrativa);
            if (!is_array($resultado_administrativa) || !array_key_exists('id_sa', $resultado_administrativa)) {
                $this->db->transRollback();
                return $resultado_administrativa;
            }
            $id_sa = intval($resultado_administrativa['id_sa']);

            // Insertar solo las relaciones en la ficha
            $resultado_ficha = $this->insertarFicha($id_campus, $id_se, $id_sne, $id_sf, $id_sa);

            if ($resultado_ficha !== true) {
                $this->db->transRollback();
                return $resultado_ficha;
            }

            $this->db->transCommit();
            return true;
        } catch (Exception $ex) {
            $this->db->transRollback();
            return "Error: " . $ex->getMessage();
        }
    }

    public function insertarSeguridadEstructural($seguridad_estructural)
    {
        try {
            $id_analista = $seguridad_estructural['id_analista'];
            $id_campus = $seguridad_estructural['id_campus'];
            $nombre = "Seguridad estructural";

            $errors = array();

            if (empty($id_analista)) {
                $errors[] = "Error, inténtelo más tarde";
            }
            if (empty($id_campus)) {
                $errors[] = "Error, inténtelo más tarde 2";
            }

            // Validar que los campos del formulario no estén vacíos y calcular el promedio
            $suma = 0;
            $contador = 0;
            for ($i = 1; $i <= 25; $i++) {
                $item_name = "item$i";
                if (empty($seguridad_estructural[$item_name])) {
                    $errors[] = "Error: La pregunta número $i está vacía";
                } else {
                    $suma += intval($seguridad_estructural[$item_name]);
                    $contador++;
                }
            }

            if (!empty($errors)) {
                return $errors; // Devuelve los errores como resultado
            }

            // Calcular promedio
            $promedio = ($contador > 0) ? $suma / $contador : 0;

            // Insertar en la tabla seguridad_estructural con el promedio
            $data_se = [
                'id_campus' => $id_campus,
                'id_analista' => $id_analista,
                'nombre' => $nombre,
                'promedio' => $promedio
            ];

            $this->db->table('seguridad_estructural')->insert($data_se);
            $id_se = $this->db->insertID();

            // Preparar datos para insertar en subseccion_seguridad_estructural
            $data_sub = ['id_se' => $id_se];
            for ($i = 1; $i <= 25; $i++) {
                $valor_respuesta = isset($seguridad_estructural["item$i"]) ? $seguridad_estructural["item$i"] : null;
                $data_sub["valor_$i"] = $valor_respuesta;
            }

            $this->db->table('subseccion_seguridad_estructural')->insert($data_sub);

            return ['id_se' => $id_se, 'id_campus' => $id_campus, 'promedio' => $promedio];
        } catch (Exception $e) {
            return "Error al insertar datos en la base de datos: " . $e->getMessage();
        }
    }

    public function insertarSeguridadNoEstructural($seguridad_no_estructural)
    {
        try {
            $nombre = "Seguridad no estructural";
            $errors = array();

            $forms_sizes = [
                2 => [26, 35],
                3 => [34, 41],
                4 => [42, 48],
                5 => [49, 54],
                6 => [55, 60],
                7 => [61, 72],
                8 => [73, 80],
                9 => [81, 97],
            ];
            $forms_names = [
                2 => "sistema_electrico",
                3 => "telecomunicaciones",
                4 => "sistema_de_provision_de_agua",
                5 => "sistema_de_combustibles",
                6 => "gases_de_laboratorios",
                7 => "laboratorio_q_b_t_alimentaria",
                8 => "laboratorio_e_e_mecanica",
                9 => "elementos_arquitectonicos",
            ];

            // Obtener el id_analista e id_campus del primer formulario para insertar en seguridad_no_estructural
            $primer_formulario = reset($seguridad_no_estructural);
            $id_analista = $primer_formulario['data']['id_analista'];
            $id_campus = $primer_formulario['data']['id_campus'];

            // Validar id_analista y id_campus
            if (empty($id_analista)) {
                $errors[] = "Error: El id_analista está vacío";
            }
            if (empty($id_campus)) {
                $errors[] = "Error: El id_campus está vacío";
            }

            if (!empty($errors)) {
                return $errors;
            }

            // Variables para calcular el promedio general
            $suma_total = 0;
            $contador_total = 0;
            $promedios_subsecciones = [];

            // Realizar las validaciones primero para asegurar que no hay errores
            foreach ($seguridad_no_estructural as $value) {
                $formIndex = $value['formIndex'];
                $data = $value['data'];

                // Verificar si el índice del formulario existe en el arreglo $forms_sizes
                if (array_key_exists(intval($formIndex), $forms_sizes)) {
                    // Verificar si hay datos y si es un arreglo
                    if (is_array($data) && !empty($data)) {
                        // Validar que ninguna de las preguntas del formulario esté vacía y que estén entre 0 y 4
                        for ($i = $forms_sizes[$formIndex][0]; $i <= $forms_sizes[$formIndex][1]; $i++) {
                            $item_name = "item$i";
                            if (!isset($data[$item_name]) || !is_numeric($data[$item_name]) || $data[$item_name] < 0 || $data[$item_name] > 4) {
                                $errors[] = "Error: La pregunta número $i en el formulario $formIndex está vacía o no es válida";
                            }
                        }
                    } else {
                        $errors[] = "Error: Los datos del formulario $formIndex están vacíos o no son válidos";
                    }
                } else {
                    $errors[] = "Error: El índice del formulario $formIndex no es válido";
                }
            }

            // Si hay errores, retornarlos
            if (!empty($errors)) {
                return $errors;
            }

            // Insertar en seguridad_no_estructural (sin promedio por ahora)
            $data_sne = [
                'id_campus' => $id_campus,
                'id_analista' => $id_analista,
                'nombre' => $nombre
            ];

            $this->db->table('seguridad_no_estructural')->insert($data_sne);
            $id_sne = $this->db->insertID();

            // Realizar las inserciones en las tablas de subsección y calcular promedios
            foreach ($seguridad_no_estructural as $value) {
                $formIndex = $value['formIndex'];
                $data = $value['data'];

                if (array_key_exists(intval($formIndex), $forms_sizes)) {
                    // Calcular promedio para esta subsección
                    $suma_subseccion = 0;
                    $contador_subseccion = 0;

                    // Preparar datos para inserción
                    $data_sub = ['id_sne' => $id_sne];
                    for ($i = $forms_sizes[$formIndex][0]; $i <= $forms_sizes[$formIndex][1]; $i++) {
                        $valor_respuesta = isset($data["item$i"]) ? $data["item$i"] : null;
                        $data_sub["valor_$i"] = $valor_respuesta;

                        // Sumar para promedio
                        if (is_numeric($valor_respuesta)) {
                            $suma_subseccion += intval($valor_respuesta);
                            $contador_subseccion++;

                            // Añadir al total
                            $suma_total += intval($valor_respuesta);
                            $contador_total++;
                        }
                    }

                    // Calcular promedio de subsección
                    $promedio_subseccion = ($contador_subseccion > 0) ? $suma_subseccion / $contador_subseccion : 0;
                    $promedios_subsecciones[$forms_names[$formIndex]] = $promedio_subseccion;

                    // Añadir promedio al conjunto de datos
                    $data_sub['promedio'] = $promedio_subseccion;

                    $tableName = $forms_names[$formIndex];
                    $this->db->table($tableName)->insert($data_sub);
                }
            }

            // Calcular el promedio general
            $promedio_general = ($contador_total > 0) ? $suma_total / $contador_total : 0;

            // Actualizar el registro en seguridad_no_estructural con el promedio
            $this->db->table('seguridad_no_estructural')
                ->where('id_sne', $id_sne)
                ->update(['promedio' => $promedio_general]);

            return [
                'id_sne' => $id_sne,
                'id_campus' => $id_campus,
                'promedio' => $promedio_general,
                'promedios_subsecciones' => $promedios_subsecciones
            ];
        } catch (Exception $e) {
            return "Error al insertar datos en la base de datos: " . $e->getMessage();
        }
    }

    public function insertarSeguridadFuncional($seguridad_funcional)
    {
        try {
            $nombre = "Seguridad funcional";
            $errors = array();

            $forms_sizes = [
                10 => [98, 105],
                11 => [106, 127],
                12 => [128, 133],
            ];
            $forms_names = [
                10 => "organizacion_comite",
                11 => "procedimientos_operativos",
                12 => "disponibilidad_logistica",
            ];

            // Obtener el id_analista e id_campus del primer formulario para insertar en seguridad_funcional
            $primer_formulario = reset($seguridad_funcional);
            $id_analista = $primer_formulario['data']['id_analista'];
            $id_campus = $primer_formulario['data']['id_campus'];

            // Validar id_analista y id_campus
            if (empty($id_analista)) {
                $errors[] = "Error: El id_analista está vacío";
            }
            if (empty($id_campus)) {
                $errors[] = "Error: El id_campus está vacío";
            }

            if (!empty($errors)) {
                return $errors;
            }

            // Variables para calcular el promedio general
            $suma_total = 0;
            $contador_total = 0;
            $promedios_subsecciones = [];

            // Validar los datos primero
            foreach ($seguridad_funcional as $value) {
                $formIndex = $value['formIndex'];
                $data = $value['data'];

                if (array_key_exists(intval($formIndex), $forms_sizes)) {
                    if (is_array($data) && !empty($data)) {
                        for ($i = $forms_sizes[$formIndex][0]; $i <= $forms_sizes[$formIndex][1]; $i++) {
                            $item_name = "item$i";
                            if (!isset($data[$item_name]) || !is_numeric($data[$item_name]) || $data[$item_name] < 0 || $data[$item_name] > 4) {
                                $errors[] = "Error: La pregunta número $i del Formulario $formIndex tiene un valor inválido";
                            }
                        }
                    } else {
                        $errors[] = "No hay datos para el formulario: $formIndex";
                    }
                } else {
                    $errors[] = "Formulario no encontrado";
                }
            }

            if (!empty($errors)) {
                return $errors;
            }

            // Insertar en seguridad_funcional (sin promedio por ahora)
            $data_sf = [
                'id_campus' => $id_campus,
                'id_analista' => $id_analista,
                'nombre' => $nombre
            ];

            $this->db->table('seguridad_funcional')->insert($data_sf);
            $id_sf = $this->db->insertID();

            // Realizar las inserciones en las tablas de subsección y calcular promedios
            foreach ($seguridad_funcional as $value) {
                $formIndex = $value['formIndex'];
                $data = $value['data'];

                // Calcular promedio para esta subsección
                $suma_subseccion = 0;
                $contador_subseccion = 0;

                // Preparar datos para inserción
                $data_sub = ['id_sf' => $id_sf];
                for ($i = $forms_sizes[$formIndex][0]; $i <= $forms_sizes[$formIndex][1]; $i++) {
                    $valor_respuesta = isset($data["item$i"]) ? $data["item$i"] : null;
                    $data_sub["valor_$i"] = $valor_respuesta;

                    // Sumar para promedio
                    if (is_numeric($valor_respuesta)) {
                        $suma_subseccion += intval($valor_respuesta);
                        $contador_subseccion++;

                        // Añadir al total
                        $suma_total += intval($valor_respuesta);
                        $contador_total++;
                    }
                }

                // Calcular promedio de subsección
                $promedio_subseccion = ($contador_subseccion > 0) ? $suma_subseccion / $contador_subseccion : 0;
                $promedios_subsecciones[$forms_names[$formIndex]] = $promedio_subseccion;

                // Añadir promedio al conjunto de datos
                $data_sub['promedio'] = $promedio_subseccion;

                $tabla_subseccion = $forms_names[$formIndex];
                $this->db->table($tabla_subseccion)->insert($data_sub);
            }

            // Calcular el promedio general
            $promedio_general = ($contador_total > 0) ? $suma_total / $contador_total : 0;

            // Actualizar el registro en seguridad_funcional con el promedio
            $this->db->table('seguridad_funcional')
                ->where('id_sf', $id_sf)
                ->update(['promedio' => $promedio_general]);

            return [
                'id_sf' => $id_sf,
                'id_campus' => $id_campus,
                'promedio' => $promedio_general,
                'promedios_subsecciones' => $promedios_subsecciones
            ];

        } catch (Exception $e) {
            return "Error al insertar datos en la base de datos: " . $e->getMessage();
        }
    }

    public function insertarSeguridadAdministrativa($seguridad_administrativa)
    {
        try {
            $nombre = "Seguridad administrativa";
            $errors = array();

            $forms_sizes = [
                13 => [134, 138],
                14 => [139, 142],
                15 => [143, 145],
                16 => [146, 149],
                17 => [150, 154],
                18 => [155, 157],
                19 => [158, 161],
            ];
            $forms_names = [
                13 => "invertir_reduccion",
                14 => "trabajo_comunidad",
                15 => "trabajo_multidisciplinario",
                16 => "capacita_personal",
                17 => "efectos_negativos",
                18 => "bienestar_comunidad",
                19 => "mejoras_continuas",
            ];

            // Obtener el id_analista e id_campus del primer formulario para insertar en seguridad_administrativa
            $primer_formulario = reset($seguridad_administrativa);
            $id_analista = $primer_formulario['data']['id_analista'];
            $id_campus = $primer_formulario['data']['id_campus'];

            // Validar id_analista y id_campus
            if (empty($id_analista)) {
                $errors[] = "Error: El id_analista está vacío";
            }
            if (empty($id_campus)) {
                $errors[] = "Error: El id_campus está vacío";
            }

            if (!empty($errors)) {
                return $errors;
            }

            // Variables para calcular el promedio general
            $suma_total = 0;
            $contador_total = 0;
            $promedios_subsecciones = [];

            // Validar los datos primero
            foreach ($seguridad_administrativa as $value) {
                $formIndex = $value['formIndex'];
                $data = $value['data'];

                if (array_key_exists(intval($formIndex), $forms_sizes)) {
                    if (is_array($data) && !empty($data)) {
                        for ($i = $forms_sizes[$formIndex][0]; $i <= $forms_sizes[$formIndex][1]; $i++) {
                            $item_name = "item$i";
                            if (!isset($data[$item_name]) || !is_numeric($data[$item_name]) || $data[$item_name] < 0 || $data[$item_name] > 4) {
                                $errors[] = "Error: La pregunta número $i del Formulario $formIndex tiene un valor inválido";
                            }
                        }
                    } else {
                        $errors[] = "No hay datos para el formulario: $formIndex";
                    }
                } else {
                    $errors[] = "Formulario no encontrado";
                }
            }

            if (!empty($errors)) {
                return $errors;
            }

            // Insertar en seguridad administrativa (sin promedio por ahora)
            $data_sa = [
                'id_campus' => $id_campus,
                'id_analista' => $id_analista,
                'nombre' => $nombre
            ];

            $this->db->table('seguridad_administrativa')->insert($data_sa);
            $id_sa = $this->db->insertID();

            // Realizar las inserciones en las tablas de subsección y calcular promedios
            foreach ($seguridad_administrativa as $value) {
                $formIndex = $value['formIndex'];
                $data = $value['data'];

                // Calcular promedio para esta subsección
                $suma_subseccion = 0;
                $contador_subseccion = 0;

                // Preparar datos para inserción
                $data_sub = ['id_sa' => $id_sa];
                for ($i = $forms_sizes[$formIndex][0]; $i <= $forms_sizes[$formIndex][1]; $i++) {
                    $valor_respuesta = isset($data["item$i"]) ? $data["item$i"] : null;
                    $data_sub["valor_$i"] = $valor_respuesta;

                    // Sumar para promedio
                    if (is_numeric($valor_respuesta)) {
                        $suma_subseccion += intval($valor_respuesta);
                        $contador_subseccion++;

                        // Añadir al total
                        $suma_total += intval($valor_respuesta);
                        $contador_total++;
                    }
                }

                // Calcular promedio de subsección
                $promedio_subseccion = ($contador_subseccion > 0) ? $suma_subseccion / $contador_subseccion : 0;
                $promedios_subsecciones[$forms_names[$formIndex]] = $promedio_subseccion;

                // Añadir promedio al conjunto de datos
                $data_sub['promedio'] = $promedio_subseccion;

                $tabla_subseccion = $forms_names[$formIndex];
                $this->db->table($tabla_subseccion)->insert($data_sub);
            }

            // Calcular el promedio general
            $promedio_general = ($contador_total > 0) ? $suma_total / $contador_total : 0;

            // Actualizar el registro en seguridad_administrativa con el promedio
            $this->db->table('seguridad_administrativa')
                ->where('id_sa', $id_sa)
                ->update(['promedio' => $promedio_general]);

            return [
                'id_sa' => $id_sa,
                'id_campus' => $id_campus,
                'promedio' => $promedio_general,
                'promedios_subsecciones' => $promedios_subsecciones
            ];

        } catch (Exception $e) {
            return "Error al insertar datos en la base de datos: " . $e->getMessage();
        }
    }

    public function insertarFicha($id_campus, $id_se, $id_sne, $id_sf, $id_sa)
    {
        // Validación de datos
        if (!is_numeric($id_campus) || !is_numeric($id_se) || !is_numeric($id_sne) || !is_numeric($id_sf) || !is_numeric($id_sa)) {
            return "Error: Los IDs deben ser valores numéricos." . $id_campus . " " . $id_se . " " . $id_sne . " " . $id_sf . " " . $id_sa;
        }

        try {
            $data = [
                'id_campus' => $id_campus,
                'id_se' => $id_se,
                'id_sne' => $id_sne,
                'id_sf' => $id_sf,
                'id_sa' => $id_sa,
                'fecha' => date('Y-m-d H:i:s') // Usar 'fecha' que es el campo en tu SQL
            ];

            $this->db->table('fichas')->insert($data);
            return true;
        } catch (Exception $e) {
            return "Error al insertar la ficha en la base de datos: " . $e->getMessage();
        }
    }
}