<?php

class Marcas_Controller extends CI_Controller {
   
    function __construct() {
        parent::__construct();
    }
    
    function index(){
        $this->load->model('marcas');
        $r = $this->marcas->listar();
         echo "<pre>";
        print_r($r->result_array());
       
    }
}