<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of home_controller
 *
 * @author Raúl
 */
class Home_Controller extends CI_Controller{
    
    function __construct() {
        parent::__construct();
    }
    
    function index(){
         $this->load->model('Home_Controller');
        $r = $this->Home_Controller->listar();
         echo "<pre>";
        print_r($r->result_array());
        
    }
    function listar(){}
    
    function crear(){}
    
    function modificar($id){}
    
    function eliminar($id){}
    
    
}
