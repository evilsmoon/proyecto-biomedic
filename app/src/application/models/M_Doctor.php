<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_Doctor extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function obtenerOrdenesPorPersonalAsignado($idPersonal) {
        $this->db->select('ot.id, ot.fecha, ot.prioridad, ot.servicio_medico, u.id as personal_asignado, CONCAT(u.nombre, " ", u.apellido) as nombre_personal, ot.asunto, ot.solicitado_por, (SELECT CONCAT(us.nombre, " ", us.apellido) FROM usuarios us WHERE us.id = ot.solicitado_por) as nombre_solicitante, ot.estado, e.id as id_equipo, e.nombre_equipo');
        $this->db->from('orden_trabajo as ot');
        $this->db->join('equipos e', 'ot.id_equipo = e.id', 'LEFT');
        $this->db->join('usuarios u', 'ot.personal_asignado = u.id', 'LEFT');
        $this->db->where('ot.personal_asignado', $idPersonal);
        $query = $this->db->get();
        return $query->result_array();
    }
    public function obtener_todas_las_fichas() {
        $query = $this->db->get('fichas_tecnicas');
        return $query->result_array();
    }

    public function obtenerCronogramaPorPersonalAsignado($idPersonal)
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
            ->where('u.id',$idPersonal)
            ->get();
        return $query->result();
    }

}