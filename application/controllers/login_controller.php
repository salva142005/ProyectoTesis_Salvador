<?php

class Login_Controller extends CI_Controller{
    
    static $folder_view = 'login';
            
    function __construct() {
        parent::__construct();
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger alert-dismissable"><i class="icon fa fa-ban"></i>', '</div>');
    }
    
    function index (){
        $this->load->view(self::$folder_view.'/index');
    }
    
    function registrar_usuario(){
        
        $this->load->view(self::$folder_view.'/registrar_usuario');
    }
    function success(){
        $this->load->view(self::$folder_view.'/success');
    }
    function guardar_usuario(){
        $this->load->model('Usuario');
        if (!$this->form_validation->run('valid_usuario')){
            $this->load->view(self::$folder_view.'/registrar_usuario');
            return;
        }
        $this->Usuario->set_nombre($this->input->post('nombre'));
        $this->Usuario->set_email($this->input->post('email'));
        $this->Usuario->set_telefono($this->input->post('telefono'));
        $this->Usuario->set_clave($this->input->post('clave'));
        $this->Usuario->set_admin(0);
        $this->Usuario->insert();
        redirect(base_url('index.php/login_controller/success'));
    }
    
    function validar_usuario(){// error_reporting(~E_WARNING);
        $this->load->model('Login');
        $this->Login->set_email(trim($this->input->post('email', TRUE)));
        $this->Login->set_clave(trim($this->input->post('clave', TRUE)));
        if ($this->Login->existe_usuario()){
            redirect(base_url('index.php/home_controller/'));
        }else {
            redirect(base_url('index.php/login_controller/usuario_no_existe'));  
        }
       
    }
    
    function usuario_no_existe(){
        $this->load->view(self::$folder_view.'/usuario_no_existe');
    }
    
    function out(){
        $this->session->sess_destroy();
        redirect(base_url());
    }
}
