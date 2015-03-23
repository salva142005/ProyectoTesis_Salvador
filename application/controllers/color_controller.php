<?php

class Color_Controller extends CI_Controller {
   
    static $view_folder = "color";
    
    function __construct() {
        parent::__construct();
        $this->load->model('Color');
    }
    
    function index(){
        $this->listar();
    }
    
    function listar(){
        $data['colores'] = $this->Color->get_colores();
        $data['titulo'] = "Gestionar colores";
        $this->load->view(self::$view_folder.'/listar', $data);
    }
    
    function crear(){
        $this->load->view(self::$view_folder.'/crear');
    }
    
    function modificar($id){
        $data['color']=$this->Color->get_color_x_id($id);
        $this->load->view(self::$view_folder.'/modificar', $data);
    }
    
    function request($id = null){
        $this->Color->set_nombre($this->input->post('nombre'));
        if ($id == null){
            $this->Color->insert(); 
        } else {
           $this->Color->set_id($id);
           $this->Color->update();
        }
        redirect(base_url("index.php/color_controller/listar"));
    }
    
    function eliminar($id){
         $this->Color->set_id($id);
         $this->Color->delete();
         $this->listar();
    } 
}
