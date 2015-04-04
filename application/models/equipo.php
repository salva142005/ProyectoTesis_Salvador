
<?php

class Equipo extends CI_Model {

    var $id;
    var $nombre;
    var $modelo_id;
    var $operadora_id;
    var $usuario_id;
    var $color_id;
    var $precio;
    var $estado;
    var $imagen;
    var $creado;
    var $modificado;
    static $tabla = 'equipos';

    function __construct() {
        parent::__construct();
    }

    function get_id() {
        return $this->id;
    }

    function get_nombre() {
        return $this->nombre;
    }

    function get_modelo_id() {
        return $this->modelo_id;
    }

    function get_operadora_id() {
        return $this->operadora_id;
    }

    function get_usuario_id() {
        return $this->usuario_id;
    }

    function get_color_id() {
        return $this->color_id;
    }

    function get_precio() {
        return $this->precio;
    }

    function get_estado() {
        return $this->estado;
    }
    function get_imagen() {
        return $this->imagen;
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

    function set_modelo_id($modelo_id) {
        $this->modelo_id = $modelo_id;
    }

    function set_operadora_id($operadora_id) {
        $this->operadora_id = $operadora_id;
    }

    function set_usuario_id($usuario_id) {
        $this->usuario_id = $usuario_id;
    }

    function set_color_id($color_id) {
        $this->color_id = $color_id;
    }

    function set_precio($precio) {
        $this->precio = $precio;
    }

    function set_estado($estado) {
        $this->estado = $estado;
    }
    function set_imagen($imagen) {
        $this->imagen = $imagen;
    }

    function set_creado($creado) {
        $this->creado = $creado;
    }

    function set_modificado($modificado) {
        $this->modificado = $modificado;
    }
    
    function get_equipo_x_id($id){
       return $this->db->get_where(self::$tabla, array('id'=>$id))->row();  
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
        
    }

}