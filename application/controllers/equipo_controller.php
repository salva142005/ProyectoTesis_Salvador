<?php

class Equipo_Controller extends CI_Controller {
   
    function __construct() {
        parent::__construct();
    }
    
    function index(){
        $this->load->model('Equipos');
        $r = $this->equipos->listar();
         echo "<pre>";
        print_r($r->result_array());
       
    }
}