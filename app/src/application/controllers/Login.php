<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
    function __construct(){

        parent::__construct();
		$this->load->model('M_Login');
		
    }

    public function index() 
    {
        $this->load->view('plantilla/header');    
        $this->load->view('login');    
        $this->load->view('plantilla/footer');    
    }
}