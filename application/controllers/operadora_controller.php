<?php

class Operadora_Controller extends CI_Controller {
   
    function __construct() {
        parent::__construct();
    }
    
    function index(){
        $this->load->model('Operadora');
        $r = $this->Operadora->listar();
         echo "<pre>";
        print_r($r->result_array());
       
    }
    function listar(){}
    
    function crear(){}
    
    function modificar($id){}
    
    function eliminar($id){}
}
