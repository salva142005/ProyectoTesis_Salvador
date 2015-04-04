<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of login_controller
 *
 * @author Raúl
 */
class Login_Controller extends CI_Controller{
    
    static $folder_view = 'login';
            
    function __construct() {
        parent::__construct();
    }
    
    function index (){
        $this->load->view(self::$folder_view.'/index');
    }
    
    function registrar_usuario(){
        
        $this->load->view(self::$folder_view.'/registrar_usuario');
    }
    
    function guardar_usuario(){
        $this->load->model('Usuario');
        if (!$this->form_validation->run()){
            $this->load->view(self::$folder_view.'/registrar_usuario');
            return;
        }
        $this->Usuario->set_nombre($this->input->post('nombre'));
        $this->Usuario->set_email($this->input->post('email'));
        $this->Usuario->set_telefono($this->input->post('telefono'));
        $this->Usuario->set_clave(md5($this->input->post('clave')));
        $this->Usuario->insert();
    }
    
    function validar_usuario(){
        return ;
    }
}
