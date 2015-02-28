<?php

class Repuesto_Controller extends CI_Controller {
   
    function __construct() {
        parent::__construct();
    }
    
    function index(){
        $this->load->model('Repuestos');
        $r = $this->repuestos->listar();
         echo "<pre>";
        print_r($r->result_array());
       
    }
    function listar(){}
    
    function crear(){}
    
    function modificar($id){}
    
    function eliminar($id){}
}