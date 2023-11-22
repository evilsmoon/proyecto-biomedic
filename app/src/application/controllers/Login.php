<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
    function __construct()
    {

        parent::__construct();
        $this->load->model('M_Login');
    }

    public function index($page = 'Login')
    {
        if (!file_exists(APPPATH . 'views/' . $page . '.php')) {
            show_404();
        } else {
            $this->load->view('templates/home/header');
            $this->load->view('Login');
            $this->load->view('templates/home/footer');
        }
    }



    /**
     * Funcion paras ingresar a los roles Administrador, Doctor, Enfermera
     */
    public function ingresar()
    {

        if ($this->input->is_ajax_request()) {
            $username = $this->input->post('username');
            $password = $this->input->post('password');

            $res = $this->M_Login->iniciarSession($username, $password);

            if ($res) {
         

                if ($res->role === 'Administrador') {
                    echo ('1');
                } else if ($res->role === 'Doctor') {
                    echo ('2');
                } else if ($res->role === 'Enfermera') {
                    echo ('3');
                }
                $data = [
                    "id" => $res->id,
                    "Login" => TRUE,
                    "Role" => $res->role
                ];
                $this->session->set_userdata($data);
                
            }
        }else{
            redirect(base_url());
        }
    }

    public function  cerrarSession()
    {
        /* 
        SEERARAR
        */
    }
}
