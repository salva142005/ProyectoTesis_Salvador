<?php

class Usuario_Controller extends CI_Controller {
    
    static $view_folder = "usuario";

   
    function __construct() {
        parent::__construct();
    }
    
    function index(){
        $this->load->model('Usuarios');
        $r = $this->usuarios->listar();
         echo "<pre>";
        print_r($r->result_array());
       
    }
    function listar(){
        $data['Usuarios'] = $this->Usuario->get_Usuarios();
        $this->load->view(self::$view_folder.'/listar', $data);
    }
    
    function crear(){
        $this->Usuario->set_nombre('Verde Olivo');
        $this->Usuario->insert();
    }
    
    function modificar($id){
        $this->Usuario->set_id($id);
        $this->Usuario->set_nombre('Amarillo Pollito');
        $this->Usuario->update();
        
    }
    
    function eliminar($id){
         $this->Usuario->set_id($id);
         $this->Usuario->delete();
         $this->listar();
    }  
}