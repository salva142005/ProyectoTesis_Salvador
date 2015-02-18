<?php

class Servicios extends CI_Model {

    var $id;
    var $descripcion;
    var $usuario_id;
    var $precio;
    var $creado;
    var $modificado;
    static $tabla = 'marcas';

    function __construct() {
        parent::__construct();
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

    function insert() {
        
    }

    function update() {
        
    }

    function delete() {
        
    }

    function get_object() {
        return $this;
    }

}
