<?php

class Usuario extends CI_Model {

    var $id;
    var $nombre;
    var $email;
    var $telefono;
    var $clave;
    var $creado;
    var $admin;
    var $modificado;
    static $tabla = 'usuarios';

    function __construct() {
        parent::__construct(); 
    }

    function get_id() {
        return $this->id;
    }

    function get_nombre() {
        return $this->nombre;
    }

    function get_email() {
        return $this->email;
    }

    function get_telefono() {
        return $this->telefono;
    }

    function get_clave() {
        return $this->clave;
    }

    function get_creado() {
        return $this->creado;
    }
    function get_admin() {
        return $this->admin;
    }

    function get_modificado() {
        return $this->modificado;
    }

    function set_id($id) {
        $this->id = $id;
    }

    function set_nombre($nombre) {
        $this->nombre = $nombre;
    }

    function set_email($email) {
        $this->email = $email;
    }

    function set_telefono($telefono) {
        $this->telefono = $telefono;
    }

    function set_clave($clave) {
        $this->clave = $clave;
    }

    function set_creado($creado) {
        $this->creado = $creado;
    }
    function set_admin($admin) {
        $this->admin = $admin;
    }

    function set_modificado($modificado) {
        $this->modificado = $modificado;
    }

    function insert() {
        $this->db->set($this);
        $this->db->insert(self::$tabla);
    }
    
    function get_usuario_x_id($id){
        return $this->db->get_where(self::$tabla, array('id'=>$id))->row();
    }
    
    function update() {
        $this->db->set($this);
        $this->db->where('id', $this->id);
        $this->db->update(self::$tabla);
    }

    function delete() {
        
    }

}