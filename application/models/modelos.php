<?php

class Modelos extends CI_Model {

    var $id;
    var $nombre;
    var $marca_id;
    var $creado;
    var $modificado;
    static $tabla = 'marcas';

    function __construct() {
        parent::__construct();
    }

    function get_id() {
        return $this->id;
    }

    function get_nombre() {
        return $this->nombre;
    }

    function get_marca_id() {
        return $this->marca_id;
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

    function set_nombre($nombre) {
        $this->nombre = $nombre;
    }

    function set_marca_id($marca_id) {
        $this->marca_id = $marca_id;
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
