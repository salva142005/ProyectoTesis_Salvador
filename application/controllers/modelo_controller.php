<?php

class Modelo_Controller extends CI_Controller {
   
    function __construct() {
        parent::__construct();
    }
    
    function index(){
        $this->load->model('Modelos');
        $r = $this->modelos->listar();
         echo "<pre>";
        print_r($r->result_array());
       
    }
}