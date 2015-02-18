<?php

class Colores_Controller extends CI_Controller {
   
    function __construct() {
        parent::__construct();
    }
    
    function index(){
        $this->load->model('colores');
        $r = $this->colores->listar();
         echo "<pre>";
        print_r($r->result_array());
       
    }
}
