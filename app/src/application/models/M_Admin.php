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
}
