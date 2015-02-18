<?php

class Equipos_Controller extends CI_Controller {
   
    function __construct() {
        parent::__construct();
    }
    
    function index(){
        $this->load->model('equipos');
        $r = $this->equipos->listar();
         echo "<pre>";
        print_r($r->result_array());
       
    }
}
