<?php

class Color_Controller extends CI_Controller {
   
    static $view_folder = "color";
    
    function __construct() {
        parent::__construct();
        $this->load->model('Color');
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger alert-dismissable"><i class="icon fa fa-ban"></i>', '</div>');
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
        if (!$this->form_validation->run('validar_color')){
            $this->crear();
            return;
        }
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
         if($this->Color->delete()){
              $this->listar();
              return;
         }
        
        
        $data = array(
            "titulo" => 'Error',
            "actionRedirect" => 'color_controller/listar',
            "mensaje" => 'No se puede eliminar este color esta siendo usado'
        );
        $this->load->view("error_views", $data);
        
         
    } 
}
