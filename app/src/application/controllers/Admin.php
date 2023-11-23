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
            $data['equipos'] = $this->M_Admin->obtenerEquipos();
            $this->load->view('admin/templates/Header');
            $this->load->view('admin/templates/Navbar');
            $this->load->view('admin/templates/Sidebar');
            $this->load->view('admin/Home', $data);
            $this->load->view('admin/forms/Form-Inventario');
            $this->load->view('admin/forms/Form-Formulario');
            $this->load->view('admin/templates/Footer');
        }
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
        redirect('Admin');
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

            $res = $this->M_Admin->actualizarEquipo($id, $data);
            redirect('Admin');
        }
        redirect('Admin');
    }

    public function eliminar()
    {
        if ($this->input->server('REQUEST_METHOD') === 'GET') {
            $id = $this->input->get('id');

            $res = $this->M_Admin->eliminarEquipo($id);

            echo $res;
        }
        redirect('Admin');
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

    public function detallesFormulario()
    {
        if ($this->input->server('REQUEST_METHOD') === 'GET') {
           
            $id = $this->input->get('id');
            $detalles = $this->M_Admin->obtenerDetallesEquiposFormulario($id);
            header('Content-Type: application/json');
            echo json_encode($detalles);
        }
    }

    public function agregarEquipoFormulario()
    {
        if ($this->input->server('REQUEST_METHOD') === 'POST') {
           
            $idEquipo = $this->input->post('idEquipo');

            $arrayRespuestas = array();

            $p_1_1_1   = array("id" => '1-1-1', "value" => $this->input->post('1-1-1'));
            $arrayRespuestas[] = $p_1_1_1;
            $p_1_1_2   = array("id" => '1-1-2', "value" => $this->input->post('1-1-2'));
            $arrayRespuestas[] = $p_1_1_2;
            $p_1_1_3   = array("id" => '1-1-3', "value" => $this->input->post('1-1-3'));
            $arrayRespuestas[] = $p_1_1_3;
            $p_1_2_1   = array("id" => '1-2-1', "value" => $this->input->post('1-2-1'));
            $arrayRespuestas[] = $p_1_2_1;
            $p_1_2_2   = array("id" => '1-2-2', "value" => $this->input->post('1-2-2'));
            $arrayRespuestas[] = $p_1_2_2;
            $p_1_3_1   = array("id" => '1-3-1', "value" => $this->input->post('1-3-1'));
            $arrayRespuestas[] = $p_1_3_1;
            $p_1_3_2   = array("id" => '1-3-2', "value" => $this->input->post('1-3-2'));
            $arrayRespuestas[] = $p_1_3_2;
            $p_1_3_3   = array("id" => '1-3-3', "value" => $this->input->post('1-3-3'));
            $arrayRespuestas[] = $p_1_3_3;
            $p_1_4_1   = array("id" => '1-4-1', "value" => $this->input->post('1-4-1'));
            $arrayRespuestas[] = $p_1_4_1;

            $p_2_1   = array("id"=>'2-1','value'=> $this->input->post('2-1'));
            $arrayRespuestas[] = $p_2_1;
            $p_2_2   = array("id"=>'2-2','value'=> $this->input->post('2-2'));
            $arrayRespuestas[] = $p_2_2;
            $p_2_3   = array("id"=>'2-3','value'=> $this->input->post('2-3'));
            $arrayRespuestas[] = $p_2_3;
            $p_2_4   = array("id"=>'2-4','value'=> $this->input->post('2-4'));
            $arrayRespuestas[] = $p_2_4;
            $p_2_5   = array("id"=>'2-5','value'=> $this->input->post('2-5'));
            $arrayRespuestas[] = $p_2_5; 

            foreach ($arrayRespuestas as $objeto) {
                $id = $objeto['id'];
                $value = $objeto['value'];
                $idSinGuiones = str_replace('-', '', $id);
                $numeros = str_split($idSinGuiones);

                $res ='';
                if (isset($numeros[2])) {
                    $res = $this->M_Admin->buscarRegistro($numeros[0], $numeros[1], $numeros[2]);
                }else{
                    $res = $this->M_Admin->buscarRegistro($numeros[0], $numeros[1]);
                }
        
                $this->M_Admin->crearActualizarEquipoFormulario($idEquipo,$res,$value);

            } 
        }
        redirect('Admin');
    }

    public function usuarios() {
        $data['usuarios'] = $this->M_Admin->obtenerUsuarios();
        $this->load->view('admin/templates/Header');
        $this->load->view('admin/templates/Navbar');
        $this->load->view('admin/templates/Sidebar');
        $this->load->view('admin/Usuarios.php', $data);
        $this->load->view('admin/templates/Footer');
    }
}


	
	
	