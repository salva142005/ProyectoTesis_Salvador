<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of operadora_controller
 *
 * @author Salva
 */
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
}
