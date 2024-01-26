<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
    function __construct()
    {

        parent::__construct();
        $this->load->model('M_Login');
    }

    public function index()
    {
        $this->load->view('login/templates/Header');
        $this->load->view('Login');
        $this->load->view('login/templates/Footer');
    }



    /**
     * Funcion paras ingresar a los roles Administrador, Doctor, Enfermera
     */
    public function ingresar()
    {

        if ($this->input->is_ajax_request()) {
            $username = $this->input->post('usename');
            $password = $this->input->post('usepassword');


            $res = $this->M_Login->obtener_usuario_por_email_clave($username, $password);

            if ($res) {


                if ($res['perfil'] === 'Administrador') {
                    echo ('1');
                } else if ($res['perfil'] === 'Tecnico') {
                    echo ('2');
                } else if ($res['perfil'] === 'Enfermera') {
                    echo ('3');
                }

                $data = [
                    "id" => $res['id'],
                    "Login" => TRUE,
                    "Role" => $res['perfil'],
                    'user' => $res['nombre'] . ' ' . $res['apellido'],
                ];
                $this->session->set_userdata($data);
            }
        } else {
            redirect(base_url());
        }
    }

    public function cerrar_sesion()
    {
        $this->session->unset_userdata('id');
        $this->session->sess_destroy();
        redirect(base_url());
    }
}
