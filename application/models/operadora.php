<?php

class Operadora extends CI_Model {

    var $id;
    var $nombre;
    var $creado;
    var $modificado;
    static $tabla = 'operadoras';

    function __construct() {
        parent::__construct();
    }

    function get_id() {
        return $this->id;
    }

    function get_nombre() {
        return $this->nombre;
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

    function set_creado($creado) {
        $this->creado = $creado;
    }

    function set_modificado($modificado) {
        $this->modificado = $modificado;
    }

    function get_operadoras() {
        $sql = "SELECT * FROM " . self::$tabla; // Lenguaje SQL
        $result = $this->db->query($sql);
        return $result->result();
    }

    function get_operadora_x_id($id) {
         return $this->db->get_where(self::$tabla, array('id'=>$id))->row();
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
