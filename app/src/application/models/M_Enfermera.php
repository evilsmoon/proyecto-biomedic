<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Enfermera extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function obtenerEquipos()
    {
        $query = $this->db->get('equipos');
        return $query->result();
    }

    public function obtenerDetallesEquiposFormulario($id_equipo)
    {
        $this->db->select('ef.id_equipo, ef.id_formulario, f.id_padre, f.id_categoria, f.id_subcategoria, f.descripcion, ef.puntuacion');
        $this->db->from('equipos_formulario ef');
        $this->db->join('formulario f', 'ef.id_formulario = f.id_formulario', 'left');
        $this->db->where('ef.id_equipo', $id_equipo);
        $query = $this->db->get();
        return $query->result();
    }

    public function insertarOrdenTrabjo($data)
    {

        $this->db->insert('orden_trabajo', $data);

        return $this->db->insert_id();
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
        return $query->result_array();
    }


    public function actualizarEstadoReparacion($idOrdenTrabajo, $estado)
    {
        $this->db->set('estado', $estado);
        $this->db->where('id', $idOrdenTrabajo);
        $this->db->update('orden_trabajo');
        return $this->db->affected_rows() > 0;
    }
}
