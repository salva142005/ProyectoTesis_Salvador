<?php

class Modelo extends CI_Model {

    var $id;
    var $nombre;
    var $marca_id;
    var $creado;
    var $modificado;
    static $tabla = 'modelos';

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
    
    function query_without_condition(){
        $select = "modelos.id, modelos.nombre, modelos.marca_id, marcas.nombre AS marca ";
        $this->db->select($select);
        $this->db->from(self::$tabla);
        $this->db->join('marcas', 'marcas.id =  modelos.marca_id');
    }
    
    function get_modelos(){
        $this->query_without_condition();
        return $this->db->get()->result();
    }
    
    function get_modelo_x_id($id){
        $this->query_without_condition();
        $this->db->where('modelos.id', $id);
       return $this->db->get()->row();
    }
    
    function insert() {
        $this->db->set($this);
        $this->db->insert(self::$tabla);
    }

    function update() {
        $this->db->set($this);
        $this->db->where('id', $this->id);
        $this->db->update(self::$tabla);
    }

    function delete() {
        $this->db->delete(self::$tabla, array('id' => $this->id));
    }

}