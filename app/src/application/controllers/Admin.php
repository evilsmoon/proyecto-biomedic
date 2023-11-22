<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    function __construct()
    {
        parent::__construct();

        if ($this->session->userdata('Role') !== 'Administrador') {

            redirect(base_url());
        }

        $this->load->model('M_Admin');
    }


    public function index($page = 'Admin')
    {
        if (!file_exists(APPPATH . 'views/' . $page . '.php')) {
            show_404();
        } else {
            $this->load->view('templates/home/Header');
            $this->load->view('templates/home/Navbar');
            $this->load->view('templates/home/Sidebar');
            $this->load->view('Admin');
            $this->load->view('templates/home/Footer');
        }
    }

    public function inventario()
    {
        $data['equipos'] = $this->M_Admin->obtenerEquipos();
        $this->load->view('templates/home/Header');
        $this->load->view('templates/home/Navbar');
        $this->load->view('templates/home/Sidebar');
        $this->load->view('Admin/Inventario', $data);
        $this->load->view('Admin/forms/Form-Inventario');
        $this->load->view('templates/home/Footer');
    }

    public function agregar()
    {
        if ($this->input->server('REQUEST_METHOD') === 'POST') {
            $data = array(
                'ubicacion' => $this->input->post('ubicacion'),
                'numero_inventario' => $this->input->post('numero_inventario'),
                'marca' => $this->input->post('marca'),
                'modelo' => $this->input->post('modelo'),
                'serie' => $this->input->post('serie'),
                'datos_fabricante' => $this->input->post('datos_fabricante'),
                'datos_proveedor' => $this->input->post('datos_proveedor'),
                'anio_fabricacion' => $this->input->post('anio_fabricacion')
            );

            $this->M_Admin->insertarEquipo($data);
        }
        redirect('Admin/inventario');
    }


    public function editar()
    {
        if ($this->input->server('REQUEST_METHOD') === 'POST') {
            $id = $this->input->post('id');

            $data = array(
                'ubicacion' => $this->input->post('ubicacion'),
                'numero_inventario' => $this->input->post('numero_inventario'),
                'marca' => $this->input->post('marca'),
                'modelo' => $this->input->post('modelo'),
                'serie' => $this->input->post('serie'),
                'datos_fabricante' => $this->input->post('datos_fabricante'),
                'datos_proveedor' => $this->input->post('datos_proveedor'),
                'anio_fabricacion' => $this->input->post('anio_fabricacion')
            );

            $res = $this->M_Admin->actualizarEquipo($id,$data);
            redirect('Admin/inventario');
        } 
        redirect('Admin/inventario');
    }

    public function eliminar() {
        if ($this->input->server('REQUEST_METHOD') === 'GET') {
            $id = $this->input->get('id');

            $res = $this->M_Admin->eliminarEquipo($id);

            echo $res;
        } 
        redirect('Admin/inventario');
    }

    public function obtenerEquipo()
    {
        if ($this->input->server('REQUEST_METHOD') === 'GET') {
            $id = $this->input->get('id');
            $equipo = $this->M_Admin->obtenerEquipoPorId($id);
            header('Content-Type: application/json');
            echo json_encode($equipo);
        } 
    }
}
