<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Doctor extends CI_Controller
{
    function __construct()
    {

        parent::__construct();

        if ($this->session->userdata('Role') !== 'Tecnico' ) {
            redirect(base_url());
        }

        $this->load->model('M_Doctor');
        $this->load->model('M_Admin');
    }

    public function index($page = 'Doctor')
    {
        if (!file_exists(APPPATH . 'views/' . $page . '.php')) {
            show_404();
        } else {
            $data['equipos'] = $this->M_Admin->obtenerEquipos();
            $this->load->view('admin/templates/Header');
            $this->load->view('admin/templates/Navbar');
            $this->load->view('doctors/templates/Sidebar');
            $this->load->view('doctors/Home', $data);
            $this->load->view('admin/forms/Form-Inventario');
            $this->load->view('admin/forms/Form-Formulario');
            $this->load->view('admin/templates/Footer');
        }
    }
    
    public function pendientes() {
        $data['ordenes'] = $this->M_Doctor->obtenerOrdenesPorPersonalAsignado($this->session->userdata('id'));
        $this->load->view('admin/templates/Header');
        $this->load->view('admin/templates/Navbar');
        $this->load->view('doctors/templates/Sidebar');
        $this->load->view('doctors/Pendientes',$data);
        $this->load->view('admin/templates/Footer');
    }
    public function cronograma() {
        $data['cronogramas'] = $this->M_Doctor->obtenerCronogramaPorPersonalAsignado($this->session->userdata('id'));
        $this->load->view('admin/templates/Header');
        $this->load->view('admin/templates/Navbar');
        $this->load->view('doctors/templates/Sidebar');
        $this->load->view('doctors/Cronograma', $data);
        $this->load->view('admin/templates/Footer');
    }

    public function fichas_tecnicas() {
        $data['fichas'] = $this->M_Doctor->obtener_todas_las_fichas();


        $this->load->view('admin/templates/Header');
        $this->load->view('admin/templates/Navbar');
        $this->load->view('doctors/templates/Sidebar');
        $this->load->view('doctors/FichasTecnicas',$data);
        $this->load->view('doctors/forms/Form-Ficha');
        $this->load->view('admin/templates/Footer');
    }
}
