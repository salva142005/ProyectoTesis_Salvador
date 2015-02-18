<?php

class Marca_Controller extends CI_Controller {
   
    function __construct() {
        parent::__construct();
    }
    
    function index(){
        $this->load->model('Marcas');
        $r = $this->marcas->listar();
         echo "<pre>";
        print_r($r->result_array());
       
    }
}