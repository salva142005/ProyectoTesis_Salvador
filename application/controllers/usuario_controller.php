<?php

class Usuario_Controller extends CI_Controller {
    
    static $view_folder = "usuario";

   
    function __construct() {
        parent::__construct();
        $this->load->model('Usuario');
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger alert-dismissable"><i class="icon fa fa-ban"></i>', '</div>');
    }
    
    function index(){
        //$this->load->model('Usuarios');
        $r = $this->usuarios->listar();
         echo "<pre>";
        print_r($r->result_array());
       
    }
    function listar(){
        $data['Usuarios'] = $this->Usuario->get_Usuarios();
        $this->load->view(self::$view_folder.'/listar', $data);
    }
    
    function crear(){
        
    }
    
    function modificar($id){
        $data['usuario']= $this->Usuario->get_usuario_x_id($id);
        $this->load->view(self::$view_folder.'/modificar', $data); 
    }
    
    function request($id = null){
         if (!$this->form_validation->run('valid_usuario2')){
            $this->modificar($id);
            return;
        }
        $this->Usuario->set_nombre($this->input->post('nombre'));
        $this->Usuario->set_email($this->input->post('email'));
        $this->Usuario->set_telefono($this->input->post('telefono'));
        $this->Usuario->set_clave($this->input->post('clave'));
        $this->Usuario->set_admin(0);
        if ($id != null){
           $this->Usuario->set_id($id);
           $this->Usuario->update();
           //redirect(base_url('index.php/usuario_controller/modificar/'.$id));
           $this->modificar($id);
        }
    }
    
    function eliminar($id){
         $this->Usuario->set_id($id);
         $this->Usuario->delete();
         $this->listar();
    }  
}