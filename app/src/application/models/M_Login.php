<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Login extends CI_Model
{
    
    function __construct()
    {
        parent::__construct();
        $this->load->database();

    
    }

    public function obtener_usuario_por_email_clave($email, $clave) {
        // Consulta para verificar las credenciales en la base de datos
        $this->db->select('Usuarios.*, Perfiles.nombre as perfil');
        $this->db->from('Usuarios');
        $this->db->join('Perfiles', 'Perfiles.id = Usuarios.id_perfil ');
        $this->db->where('email', $email);
        $this->db->where('clave', $clave);
        $query = $this->db->get();

        // Devuelve el resultado de la consulta si existe un usuario con esas credenciales
        return $query->row_array();
    }
}
