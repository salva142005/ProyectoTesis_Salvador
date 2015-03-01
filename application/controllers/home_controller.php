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
    static $view_folder='home';
            function __construct() {
        parent::__construct();
    }
    
    function index(){
       $this->load->view(self::$view_folder.'/index');
        
    }
   function listar(){
        $data['colores'] = $this->Color->get_colores();
        $this->load->view(self::$view_folder.'/listar', $data);
    }
    
    function crear(){
        $this->Color->set_nombre('Verde Olivo');
        $this->Color->insert();
    }
    
    function modificar($id){
        $this->Color->set_id($id);
        $this->Color->set_nombre('Amarillo Pollito');
        $this->Color->update();
        
    }
    
    function eliminar($id){
         $this->Color->set_id($id);
         $this->Color->delete();
         $this->listar();
    } 
}
