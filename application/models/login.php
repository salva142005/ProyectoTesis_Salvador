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
    var $email;
    var $clave;
    
    function __construct() {
        parent::__construct();
        //define('TABLA_USUARIO','usuarios');
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
            $condicion = array('email'=>$this->get_email(), 'clave'=>$this->get_clave());
            $usuario = $this->db->get_where('usuarios', $condicion);
            $this->load->model('Venta');
        if ($usuario->num_rows()>0){
            $u = $usuario->row();
            $usuario_session = array(
                'id' => $u->id,
                'nombre' => $u->nombre,
                'email' => $u->email,
                'telefono' => $u->telefono,
                'ventas' => $this->Venta->get_ventas_x_vendedor($u->id),
                'nro_ventas' => $this->Venta->get_numero_ventas(),
                'compras' => $this->Venta->get_ventas_por_comprador($u->id),
                'nro_compras' => $this->Venta->get_numero_compras(),
                'compras_canceladas' => $this->Venta->get_compras_canceladas($u->id),
                'nro_compras_candeladas' => $this->Venta->get_numero_compras_canceladas(),
            ); 
            
            if ($u->admin == '1'){
                $usuario_session['admin'] = TRUE;
            } else {
                $usuario_session['admin'] = FALSE;
            }
            
            $this->session->set_userdata($usuario_session);
            
            return TRUE;
        }
        return FALSE; 
    } 
    
}
