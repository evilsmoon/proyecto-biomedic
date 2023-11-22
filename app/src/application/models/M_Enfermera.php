<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Enfermera extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
}
