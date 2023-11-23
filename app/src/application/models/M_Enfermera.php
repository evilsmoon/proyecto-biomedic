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

    public function obtenerDetallesEquiposFormulario($id_equipo) {
        $this->db->select('ef.id_equipo, ef.id_formulario, f.id_padre, f.id_categoria, f.id_subcategoria, f.descripcion, ef.puntuacion');
        $this->db->from('equipos_formulario ef');
        $this->db->join('formulario f', 'ef.id_formulario = f.id_formulario', 'left');
        $this->db->where('ef.id_equipo', $id_equipo);
        $query = $this->db->get();
        return $query->result();
    }   
  
}
