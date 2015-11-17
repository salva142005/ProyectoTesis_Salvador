
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
    var $cantidad;
    var $imagen;
    var $activo;
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
    
    function get_cantidad() {
        return $this->cantidad;
    }

    function get_imagen() {
        return $this->imagen;
    }
    function get_activo() {
        return $this->activo;
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
    
    function set_cantidad($cantidad) {
        $this->cantidad = $cantidad;
    }

    function set_imagen($imagen) {
        $this->imagen = $imagen;
    }

    function set_activo($activo) {
        $this->activo = $activo;
    }

    function set_creado($creado) {
        $this->creado = $creado;
    }

    function set_modificado($modificado) {
        $this->modificado = $modificado;
    }

    function get_equipo_x_id($id) {
        return $this->get_equipos($id);
    }

    function get_equipos($id = null, $usuario = false, $busqueda=false) {
        $select = "u.id usuario_id, u.nombre nombre_usuario, u.email usuario_email, u.telefono usuario_telefono,
                c.nombre color_equipo, mar.nombre marca, model.nombre modelo, e.nombre descripcion_equipo, 
                e.operadora_id, e.color_id, e.operadora_id,e.precio precio_equipo, e.estado estado_equipo,
                o.nombre operadora, e.imagen, e.modelo_id, e.id, e.cantidad, e.activo";
        
        $this->db->select($select);
        $this->db->from(' equipos e ');
        $this->db->join('usuarios u', 'u.id = e.usuario_id', 'left');
        $this->db->join('operadoras o', 'o.id = e.operadora_id', 'left');
        $this->db->join('modelos model', 'model.id = e.modelo_id', 'left');
        $this->db->join('marcas mar', 'mar.id = model.marca_id', 'left');
        $this->db->join('colores c', 'c.id = e.color_id', 'left');
        
        if ($id != null) {
            $this->db->where("e.id", $id);
            return $this->db->get()->row();
        } else if($usuario){
            $this->db->where("e.usuario_id", $this->session->userdata("id"));
        } else if($busqueda){
            $this->db->like("e.nombre", $busqueda);
            return $this->db->get();
        } else {
            $this->db->where("e.activo", 1);
            //return $this->db->get()->row();
        }
        return $this->db->get()->result();
    }
    
    function descontar_cantidad_equipo($id){
        $this->id = $id;
        $e = $this->get_equipos($id);
        $cantidad_descontada = $e->cantidad - 1;
        $this->db->update(self::$tabla, array('cantidad'=>$cantidad_descontada), array('id'=>$id));
    }
    
    function aumentar_cantidad($id){
        $this->id = $id;
        $e = $this->get_equipos($id);
        $cantidad_aumentada = (int)$e->cantidad + 1;
        $this->db->update(self::$tabla, array('cantidad'=>$cantidad_aumentada), array('id'=>$id));
    }
    
    function numero_registros(){
        return $this->db->count_all_results();
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
    function desactivar($id){
        $this->db->where('id', $id);
        return $this->db->update(self::$tabla, array('activo' => 0));
        
    }
    function activar($id){
        $this->db->where('id', $id);
        return $this->db->update(self::$tabla, array('activo' => 1));
        
    }
    function delete() {
        
    }
    
    
}
