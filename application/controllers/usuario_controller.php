<?php

class Usuario_Controller extends CI_Controller {
   
    function __construct() {
        parent::__construct();
    }
    
    function index(){
        $this->load->model('Usuarios');
        $r = $this->usuarios->listar();
         echo "<pre>";
        print_r($r->result_array());
       
    }
    function listar(){}
    
    function crear(){}
    
    function modificar($id){}
    
    function eliminar($id){}
}