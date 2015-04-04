<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of login
 *
 * @author Raúl
 */
class Login extends CI_Model {
    private $email;
    private $clave;
    
    function __construct() {
        parent::__construct();
        define('TABLA_USUARIO','usuarios');
    }
    function get_email() {
        return $this->email;
    }

    function get_clave() {
        return $this->clave;
    }

    function set_email($email) {
        $this->email = $email;
    }

    function set_clave($clave) {
        $this->clave = $clave;
    }

    function existe_usuario(){
        $condicion = array('email'=>$this->email, 'clave'=>$this->clave);
        $usuario = $this->db->get_where(TABLA_USUARIO, $condicion);
        if ($usuario->num_rows()>0){
            $u = $usuario->row();
            $usuario_session = array(
                'id' => $u->id,
                'nombre' => $u->nombre,
                'email' => $u->email,
                'telefono' => $u->telefono,
            );  
            $this->session->set_userdata($usuario_session);
            return TRUE;
        }
        return FALSE;
    }
    
   
    
}
