<?php

class Color_Controller extends CI_Controller {
   
    static $view_folder = "color";
    
    function __construct() {
        parent::__construct();
        $this->load->model('Color');
    }
    
    function index(){
        
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
