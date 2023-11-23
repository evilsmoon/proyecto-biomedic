<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Enfermera extends CI_Controller
{
    function __construct()
    {

        parent::__construct();
        if ($this->session->userdata('Role') !== 'Enfermera') {

            redirect(base_url());
        }

        $this->load->model('M_Enfermera');
    }
    
    public function index($page = 'Enfermera')
    {
        if (!file_exists(APPPATH . 'views/' . $page . '.php')) {
            show_404();
        } else {
            $data['equipos'] = $this->M_Enfermera->obtenerEquipos();
            $this->load->view('nurse/templates/Header');
            $this->load->view('nurse/templates/Navbar');
            $this->load->view('nurse/templates/Sidebar');
            $this->load->view('nurse/Home',$data);
            $this->load->view('nurse/forms/Form-Formulario');
            $this->load->view('nurse/forms/Form-Solicitud');
            $this->load->view('nurse/templates/Footer');
        }
    }
    public function detallesFormulario()
    {
        if ($this->input->server('REQUEST_METHOD') === 'GET') {
           
            $id = $this->input->get('id');
            $detalles = $this->M_Enfermera->obtenerDetallesEquiposFormulario($id);
            header('Content-Type: application/json');
            echo json_encode($detalles);
        }
    }

}
