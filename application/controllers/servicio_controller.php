<?php

class Servicio_Controller extends CI_Controller {
   
    function __construct() {
        parent::__construct();
    }
    
    function index(){
        $this->load->model('Servicios');
        $r = $this->servicios->listar();
         echo "<pre>";
        print_r($r->result_array());
       
    }
}