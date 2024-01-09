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
            $this->load->view('nurse/Home', $data);
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

    public function insertar_orden_trabajo()
    {

        if ($this->input->server('REQUEST_METHOD') === 'POST') {
            $datos = array(
                'id_equipo' => $this->input->post('id_equipo'),
                'prioridad' => $this->input->post('prioridad'),
                'servicio_medico' => $this->input->post('servicio_medico'),
                'asunto' => $this->input->post('asunto'),
                'solicitado_por' => $this->input->post('solicitado_por'),
                'estado' => 'PENDIENTE',
            );

            $id_insertado = $this->M_Enfermera->insertarOrdenTrabjo($datos);

            if ($id_insertado) {
                // La inserción fue exitosa
                echo 'Se insertó el registro con ID: ' . $id_insertado;
            } else {
                // Error al insertar
                echo 'Error al insertar el registro';
            }
        }
    }

    public function solicitudes()
    {

        $data['ordenes'] = $this->M_Enfermera->obtenerOrdenesTrabajo();
        $this->load->view('nurse/templates/Header');
        $this->load->view('nurse/templates/Navbar');
        $this->load->view('nurse/templates/Sidebar');
        $this->load->view('nurse/Solicitudes', $data);
        $this->load->view('nurse/forms/Form-Calificar');
        $this->load->view('nurse/templates/Footer');
    }

    public function calificar_orden()
    {
        if ($this->input->server('REQUEST_METHOD') === 'POST') {
            $id_orden = $this->input->post('id_orden');
            $estado = $this->input->post('estado');

            $resp = $this->M_Enfermera->actualizarEstadoReparacion($id_orden, $estado);


            redirect('Enfermera/solicitudes');
        }
    }

    public function cronograma() {
        $this->load->model('M_Admin');
        $data['cronogramas'] = $this->M_Admin->obtenerCronograma();
        $this->load->view('nurse/templates/Header');
        $this->load->view('nurse/templates/Navbar');
        $this->load->view('nurse/templates/Sidebar');
        $this->load->view('doctors/Cronograma', $data);
        $this->load->view('admin/templates/Footer');
    }
}
