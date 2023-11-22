<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User {
    public $id;
    public $name;
    public $lastname;
    public $username;
    public $password;
    public $role;

    public function __construct($id, $name, $lastname, $username, $password, $role) {
        $this->id = $id;
        $this->name = $name;
        $this->lastname = $lastname;
        $this->username = $username;
        $this->password = $password;
        $this->role = $role;
    }

    public function __toString() {
        return "{$this->id}: {$this->name} {$this->lastname} - {$this->role}";
    }
}
class M_Login extends CI_Model
{

    private $administrador;
    private $doctor;
    private $enfermera;
    
    private $users;
    
    function __construct()
    {
        parent::__construct();
        $this->load->database();

        $this->administrador =  new User(1, 'John', 'Doe', 'admin', 'admin123', 'Administrador');
        $this->doctor =  new User(2, 'Emily', 'Smith', 'doctor', 'doctor456', 'Doctor');
        $this->enfermera =  new User(3, 'Michael', 'Johnson', 'enfermera', 'nurse789', 'Enfermera');
        $this->users = array($this->administrador,$this->doctor,$this->enfermera);
    
    }

    public function iniciarSession($iUser, $iPassword)
    {

        foreach($this->users as $user)
        {
            if ($user->username === $iUser && $user->password === $iPassword) {
                return $user;
            }
        }

        return null;
    }
}
