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
        $data['titulo'] = "Gestionar colores";
        $this->load->view(self::$view_folder.'/listar', $data);
    }
    
    function crear(){
       
        $this->load->view(self::$view_folder.'/crear');
    }
    
    function request($id = null){
        if ($id == null){
            $this->Color->set_nombre($this->input->post('nombre'));
            $this->Color->insert();
            redirect(base_url("index.php/color_controller/listar"));
        } else {
            
        }
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
