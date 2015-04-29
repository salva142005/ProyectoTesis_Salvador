<?php

class Servicio extends CI_Model {

    var $id;
    var $descripcion;
    var $usuario_id;
    var $precio;
    var $creado;
    var $modificado;
    static $tabla = 'servicios';
    static $campos;

    function __construct() {
        parent::__construct();
        $this->set_campos();
    }

    function get_id() {
        return $this->id;
    }

    function get_descripcion() {
        return $this->descripcion;
    }

    function get_usuario_id() {
        return $this->usuario_id;
    }

    function get_precio() {
        return $this->precio;
    }

    function get_creado() {
        return $this->creado;
    }

    function get_modificado() {
        return $this->modificado;
    }

    function set_id($id) {
        $this->id = $id;
    }

    function set_descripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

    function set_usuario_id($usuario_id) {
        $this->usuario_id = $usuario_id;
    }

    function set_precio($precio) {
        $this->precio = $precio;
    }

    function set_creado($creado) {
        $this->creado = $creado;
    }

    function set_modificado($modificado) {
        $this->modificado = $modificado;
    }
    
    function set_campos(){
        self::$campos = "s.id servicio_id, s.descripcion descripcion_serv, s.precio, "
                . "u.nombre nombre_usuario, u.email, u.telefono, u.id usuario_id";
        $this->db->select(self::$campos);
        $this->db->from(self::$tabla.' s');
        $this->db->join('usuarios u', 's.usuario_id= u.id');
    }
    
    function get_servicios(){
        return $this->db->get()->result();
    }
        
    
    function get_servicio_x_id($id){
        $this->db->where(array('s.id'=>$id));
        return $this->db->get()->row();
    }
    
    function get_servicios_x_usuario($id_usuario){
        $this->db->where(array('u.id'=>$id_usuario));
        return $this->db->get()->result();
    }
    
    function insert() {
        $this->db->set($this);
        $this->db->insert(self::$tabla);
        return $this->db->insert_id();
    }

    function update() {
        $this->db->set($this);
        $this->db->where('id', $this->id);
        $this->db->update(self::$tabla);
    }

    function delete() {
        $this->db->delete(self::$tabla, array('id' => $this->id));
    }

    function get_object() {
        return $this;
    }

}