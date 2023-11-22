<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Doctor extends CI_Controller
{
    function __construct()
    {

        parent::__construct();

        if ($this->session->userdata('Role') !== 'Doctor') {
            redirect(base_url());
        }

        $this->load->model('M_Doctor');
    }

    public function index($page = 'Doctor')
    {
        if (!file_exists(APPPATH . 'views/' . $page . '.php')) {
            show_404();
        } else {
            $this->load->view('templates/home/Header');
            $this->load->view('Doctor');
            $this->load->view('templates/home/Footer');
        }
    }
}
