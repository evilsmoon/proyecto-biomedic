<?php

class M_Login extends CI_Model{
    
    function __construct(){
        parent::__construct();
		$this->load->database();
    }

    public function get_usuarios()
    {
            $query = $this->db->get('usuarios', 10);
            return $query->result();
    }
}