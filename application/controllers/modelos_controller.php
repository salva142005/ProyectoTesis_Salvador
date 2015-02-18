<?php

class Modelos_Controller extends CI_Controller {
   
    function __construct() {
        parent::__construct();
    }
    
    function index(){
        $this->load->model('modelos');
        $r = $this->modelos->listar();
         echo "<pre>";
        print_r($r->result_array());
       
    }
}
