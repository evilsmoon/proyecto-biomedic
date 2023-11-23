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

    public function verificarDatosExistentesEquiFormulario($id_equipo) {
        $this->db->select('COUNT(*) as cantidad_registros');
        $this->db->from('equipos_formulario');
        $this->db->where('id_equipo', $id_equipo);
    
        $query = $this->db->get();
        $result = $query->row(); // Obtiene una fila de resultados
    
        return ($result->cantidad_registros > 0); // Retorna true si hay datos relacionados, false si no los hay
    }


    public function buscarRegistro($idPadre, $idCategoria, $idSubcategoria = null) {
        // Consulta utilizando el Query Builder

        $this->db->select('id_formulario');
        $this->db->from('formulario');
        $this->db->where('id_padre', $idPadre);
        $this->db->where('id_categoria', $idCategoria);
    
        // Verificar si se proporcionó la subcategoría
        if ($idSubcategoria !== null) {
            $this->db->where('id_subcategoria', $idSubcategoria);
        }
    
        $result = $this->db->get();
    
        if ($result->num_rows() > 0) {
            // Obtener el valor de id_formulario del primer resultado
            $row = $result->row(); // Obtener una sola fila
            return $row->id_formulario; // Devuelve solo el valor de id_formulario
        } else {
            return false; // No se encontró ningún registro que cumpla con las condiciones
        }
    }

    public function obtenerDetallesEquiposFormulario($id_equipo) {
        $this->db->select('ef.id_equipo, ef.id_formulario, f.id_padre, f.id_categoria, f.id_subcategoria, f.descripcion, ef.puntuacion');
        $this->db->from('equipos_formulario ef');
        $this->db->join('formulario f', 'ef.id_formulario = f.id_formulario', 'left');
        $this->db->where('ef.id_equipo', $id_equipo);
        $query = $this->db->get();
        return $query->result();
    }

    public function crearActualizarEquipoFormulario($id_equipo, $id_formulario, $puntuacion) {
        // Verificar si existe el registro
        $this->db->where('id_equipo', $id_equipo);
        $this->db->where('id_formulario', $id_formulario);
        $query = $this->db->get('equipos_formulario');

        if ($query->num_rows() > 0) {
            // Si existe, actualiza la puntuación
            $data = array(
                'puntuacion' => $puntuacion
            );
            $this->db->where('id_equipo', $id_equipo);
            $this->db->where('id_formulario', $id_formulario);
            $this->db->update('equipos_formulario', $data);
        } else {
            // Si no existe, crea un nuevo registro
            $data = array(
                'id_equipo' => $id_equipo,
                'id_formulario' => $id_formulario,
                'puntuacion' => $puntuacion
            );
            $this->db->insert('equipos_formulario', $data);
        }
    }

    /* 
        ? Usuarios  
    */

    public function obtenerUsuarios() {
        $this->db->select('Usuarios.*, Perfiles.nombre as perfil');
        $this->db->from('Usuarios');
        $this->db->join('Perfiles', 'Perfiles.id = Usuarios.id_perfil ');
        $query = $this->db->get();
        return $query->result();
    }
    
}
