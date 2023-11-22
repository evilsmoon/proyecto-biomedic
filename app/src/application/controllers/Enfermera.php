<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Enfermera extends CI_Controller
{
    function __construct()
    {

        parent::__construct();
        echo $this->session->userdata('Role');
        echo $this->session->userdata('Login');
        echo base_url();
        
        if (!$this->session->userdata("Login") && $this->session->userdata('Role') === 'Enfermera') {

            redirect(base_url());
        }

        $this->load->model('M_Enfermera');
    }
    
    public function index($page = 'Enfermera')
    {
        if (!file_exists(APPPATH . 'views/' . $page . '.php')) {
            show_404();
        } else {
            $this->load->view('templates/home/header');
            $this->load->view('Enfermera');
            $this->load->view('templates/home/footer');
        }
    }

}
