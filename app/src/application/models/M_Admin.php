<?php
defined('BASEPATH') or exit('No direct script access allowed');
 
class M_Admin extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    /*
        ? Funciones Inventario
     */
    public function obtenerEquipos()
    {
        $query = $this->db->get('equipos');
        return $query->result();
    }
 
    public function insertarEquipo($data)
    {
        $this->db->insert('equipos', $data);
    }
 
    public function obtenerEquipoPorId($id_equipo)
    {
        $query = $this->db->get_where('equipos', array('id' => $id_equipo));
        return $query->row();
    }
 
    public function equipo_existe_por_numero_inventario($numero_inventario)
    {
        $this->db->where('numero_inventario', $numero_inventario);
        $query = $this->db->get('equipos');
        
        return ($query->num_rows() > 0) ? true : false;
    }
 
 
    public function actualizarEquipo($id_equipo, $data)
    {
        $this->db->where('id', $id_equipo);
        $this->db->update('equipos', $data);
        return $this->db->affected_rows() > 0;
    }
 
    public function eliminarEquipo($id_equipo)
    {
        $this->db->where('id', $id_equipo);
        $this->db->delete('equipos');
        return $this->db->affected_rows() > 0;
    }
 
 
    public function obtener_pregunta_por_indice($indice_pregunta)
    {
        $this->db->select('id, indice_pregunta ,ponderacion');
        $this->db->from('preguntas');
        $this->db->where('indice_pregunta', $indice_pregunta);
        $query = $this->db->get();
 
        if ($query->num_rows() > 0) {
            return $query->result_array(); // Retorna un array con los resultados
        } else {
            return array(); // Retorna un array vacío si no se encontraron resultados
        }
    }
 
    public function obtener_formulario_equipo($id_equipo)
    {
        $this->db->where('equipo_id', $id_equipo);
        $query = $this->db->get('formulario_equipo');
        if ($query->num_rows() > 0) {
            return $query->row(); // Retorna un array con los resultados
        } else {
            return array(); // Retorna un array vacío si no se encontraron resultados
        }
    }
 
    public function crearActualizarFormularioEquipo($data)
    {
        $id_equipo = $data['equipo_id'];
        $this->db->where('equipo_id', $id_equipo);
        $query = $this->db->get('formulario_equipo');
 
        if ($query->num_rows() > 0) {
            $this->db->where('equipo_id', $id_equipo);
            $this->db->update('formulario_equipo', $data);
            return $this->db->affected_rows() > 0;
        } else {
            $this->db->insert('formulario_equipo', $data);
            return $this->db->affected_rows() > 0;
        }
    }
 
    public function obtener_info_equipo_por_id($equipo_id)
    {
        $this->db->select('f.equipo_id, e.numero_inventario, e.nombre_equipo, e.area, f.valor_FMP');
        $this->db->from('formulario_equipo f');
        $this->db->join('equipos e', 'e.id = f.equipo_id', 'left');
        $this->db->where('f.equipo_id', $equipo_id);
        $query = $this->db->get();
 
        if ($query->num_rows() > 0) {
            return $query->row(); // Retorna la fila si existe
        } else {
            return null; // Retorna null si no existe
        }
    }
 
    public function obtener_mantenimiento($id_equipo)
    {
        $this->db->where('id_equipo', $id_equipo);
        $query = $this->db->get('mantenimiento_preventivo');
 
        if ($query->num_rows() > 0) {
            return $query->row_array(); // Retorna el registro si existe
        } else {
            return null; // Retorna null si no existe
        }
    }
 
    public function obtener_mantenimientos()
    {
        $query = $this->db->get('mantenimiento_preventivo');
        return $query->result();
    }
 
    public function insertar_actualizar_cronograma($equipo_id, $frecuencia, $semana_actual)
    {
 
        $dato = array();
        for ($mes = 1; $mes <= 12; $mes++) {
            for ($semana = 1; $semana <= 4; $semana++) {
                $columna = "Cuatrimestre_{$mes}_{$semana}";
                $dato[$columna] = 0;
            }
        }
 
        $this->db->where('Equipo_ID', $equipo_id);
        $query = $this->db->get('cronograma');
 
        if ($query->num_rows() > 0) {
            // Si existe, actualiza los valores correspondientes
 
            $this->db->where('Equipo_ID', $equipo_id);
            $this->db->update('cronograma', $dato);
        } else {
            // Si no existe, inserta un nuevo registro
            $dato['Equipo_ID'] = $equipo_id;
            $this->db->insert('cronograma', $dato);
        }
 
        if ($this->db->affected_rows() > 0) {
            $semanas_a_marcar = array();
            switch ($frecuencia) {
                case 'Trimestral':
                    for ($i = $semana_actual; $i <= 52; $i += 12) {
                        $semanas_a_marcar[] = $i;
                    }
                    break;
                case 'Semestral':
                    for ($i = $semana_actual; $i <= 52; $i += 24) {
                        $semanas_a_marcar[] = $i;
                    }
                    break;
                case 'Anual':
                    $semanas_a_marcar[] = $semana_actual;
                    break;
            }
 
            // Marcar las semanas correspondientes en el cronograma
            foreach ($semanas_a_marcar as $semana) {
                $mes = ceil($semana / 4); // Calcula el mes aproximado
                $semana_mes = $semana % 4 === 0 ? 4 : $semana % 4; // Obtiene la semana dentro del mes
 
                if ($mes > 12) {
                    $mes = $mes % 12; // Ajusta si se pasa del mes 12
                }
 
                $columna = "Cuatrimestre_{$mes}_{$semana_mes}";
                $data[$columna] = 1; // Marcar como verdadero
            }
 
            $this->db->where('Equipo_ID', $equipo_id);
            $this->db->update('cronograma', $data);
            return $this->db->affected_rows() > 0;
        }
    }
 
    public function insertar_actualizar_mantenimiento($datos)
    {
        $id_equipo = $datos['id_equipo'];
        $registro_actual = $this->obtener_mantenimiento($id_equipo);
 
        if ($registro_actual) {
            // Si existe, actualiza el registro
            $this->db->where('id_equipo', $id_equipo);
            $this->db->update('mantenimiento_preventivo', $datos);
        } else {
            // Si no existe, inserta un nuevo registro
            $this->db->insert('mantenimiento_preventivo', $datos);
        }
    }
 
    public function obtenerUsuarios()
    {
        $this->db->select('usuarios.*, perfiles.nombre as perfil');
        $this->db->from('usuarios');
        $this->db->join('perfiles', 'perfiles.id = usuarios.id_perfil ');
        $query = $this->db->get();
        return $query->result();
    }
 
 
    public function insertar_usuario($data)
    {
        // Insertar datos en la base de datos
        $insertado = $this->db->insert('usuarios', $data);
 
        // Verificar si la inserción fue exitosa
        if ($insertado) {
            return true; // Éxito: Usuario insertado correctamente
        } else {
            return false; // Falla: No se pudo insertar el usuario
        }
    }
 
    public function update_usuario($id, $data)
    {
        // Actualizar datos en la base de datos
        $this->db->where('id', $id);
        $actualizado = $this->db->update('usuarios', $data);
 
        // Verificar si la actualización fue exitosa
        if ($actualizado) {
            return true; // Éxito: Usuario actualizado correctamente
        } else {
            return false; // Falla: No se pudo actualizar el usuario
        }
    }
    
    public function eliminarUsuario($id)
    {
        // Actualizar datos en la base de datos
        $this->db->where('id', $id);
        $this->db->delete('usuarios');
        return $this->db->affected_rows() > 0;
    }
 
    public function obtenerUsuarioPorID($id)
    {
        $this->db->where('usuarios.id', $id);
        $this->db->select('usuarios.*, , perfiles.nombre as perfil');
        $this->db->from('usuarios');
        $this->db->join('perfiles', 'perfiles.id = usuarios.id_perfil ');
        $query = $this->db->get();
        return $query->row();
    }
 
 
    public function obtenerCronograma()
    {
 
        $query = $this->db->select("c.Equipo_ID,
        e.nombre_equipo,
        CONCAT(u.nombre, ' ', u.apellido) as nombre_personal,
        c.Cuatrimestre_1_1, c.Cuatrimestre_1_2, c.Cuatrimestre_1_3, c.Cuatrimestre_1_4,
        c.Cuatrimestre_2_1, c.Cuatrimestre_2_2, c.Cuatrimestre_2_3, c.Cuatrimestre_2_4,
        c.Cuatrimestre_3_1, c.Cuatrimestre_3_2, c.Cuatrimestre_3_3, c.Cuatrimestre_3_4,
        c.Cuatrimestre_4_1, c.Cuatrimestre_4_2, c.Cuatrimestre_4_3, c.Cuatrimestre_4_4,
        c.Cuatrimestre_5_1, c.Cuatrimestre_5_2, c.Cuatrimestre_5_3, c.Cuatrimestre_5_4,
        c.Cuatrimestre_6_1, c.Cuatrimestre_6_2, c.Cuatrimestre_6_3, c.Cuatrimestre_6_4,
        c.Cuatrimestre_7_1, c.Cuatrimestre_7_2, c.Cuatrimestre_7_3, c.Cuatrimestre_7_4,
        c.Cuatrimestre_8_1, c.Cuatrimestre_8_2, c.Cuatrimestre_8_3, c.Cuatrimestre_8_4,
        c.Cuatrimestre_9_1, c.Cuatrimestre_9_2, c.Cuatrimestre_9_3, c.Cuatrimestre_9_4,
        c.Cuatrimestre_10_1, c.Cuatrimestre_10_2, c.Cuatrimestre_10_3, c.Cuatrimestre_10_4,
        c.Cuatrimestre_11_1, c.Cuatrimestre_11_2, c.Cuatrimestre_11_3, c.Cuatrimestre_11_4,
        c.Cuatrimestre_12_1, c.Cuatrimestre_12_2, c.Cuatrimestre_12_3, c.Cuatrimestre_12_4")
            ->from('cronograma c')
            ->join('equipos e', 'e.id = c.Equipo_ID', 'left')
            ->join('usuarios u', 'u.id = c.usuario_id', 'left')
            ->get();
        return $query->result();
    }
 
 
 
    public function obtenerOrdenesTrabajo()
    {
        $query = $this->db->query("
             SELECT
                ot.id,
                ot.fecha,
                ot.prioridad,
                ot.servicio_medico,
                u.id as personal_asignado,
                CONCAT(u.nombre, ' ', u.apellido) as nombre_personal,
                ot.asunto,
                ot.solicitado_por,
                (
                    SELECT
                        CONCAT(us.nombre, ' ', us.apellido)
                    FROM usuarios us WHERE us.id = ot.solicitado_por
                ) as nombre_solicitante,
                ot.estado,
                e.id as id_equipo,
                e.nombre_equipo
            FROM orden_trabajo as ot
            LEFT JOIN equipos e ON (ot.id_equipo = e.id)
            LEFT JOIN usuarios u ON (ot.personal_asignado = u.id)");
        return $query->result();
    }
 
    public function obtenerTecnicos()
    {
        $this->db->select('usuarios.*');
        $this->db->from('usuarios');
        $this->db->where('usuarios.id_perfil', '2');
        $query = $this->db->get();
        return $query->result();
    }
 
 
    public function asignarTrabajo($orden, $data)
    {
        $this->db->where('id', $orden);
        $this->db->update('orden_trabajo', $data);
        return $this->db->affected_rows() > 0;
    }
 
    public function asignarTecnico($id_cronograma, $data)
    {
        $this->db->where('Equipo_ID', $id_cronograma);
        $this->db->update('cronograma', $data);
        return $this->db->affected_rows() > 0;
    }

    public function obtener_todas_las_fichas()
    {
        $query = $this->db->get('fichas_tecnicas');
        return $query->result_array();
    }
}
 