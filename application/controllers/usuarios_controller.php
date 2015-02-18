<?php

class Usuarios_Controller extends CI_Controller {
   
    function __construct() {
        parent::__construct();
    }
    
    function index(){
        $this->load->model('usuarios');
        $r = $this->usuarios->listar();
         echo "<pre>";
        print_r($r->result_array());
       
    }
}