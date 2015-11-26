<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of venta
 *
 * @author Raúl
 */
class Venta extends CI_Model {

    var $id;
    var $comprador_id;
    var $vendedor_id;
    var $equipo_id;
    var $estatus;
    var $descripcion;
    var $creado;
    var $modificado;
    static $tabla = 'ventas';
    static $numero_ventas = 0;
    static $numero_compras = 0;
    static $numero_compras_caceladas = 0;
    //const TABLA_USUARIO = 'usuarios';
    
    function __construct() {
        parent::__construct();
        
    }

    function get_id() {
        return $this->id;
    }

    function get_comprador_id() {
        return $this->comprador_id;
    }

    function get_vendedor_id() {
        return $this->vendedor_id;
    }

    function get_equipo_id() {
        return $this->equipo_id;
    }

    function get_estatus() {
        return $this->estatus;
    }

    function get_descripcion() {
        return $this->descripcion;
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

    function set_comprador_id($comprador_id) {
        $this->comprador_id = $comprador_id;
    }

    function set_vendedor_id($vendedor_id) {
        $this->vendedor_id = $vendedor_id;
    }

    function set_equipo_id($equipo_id) {
        $this->equipo_id = $equipo_id;
    }

    function set_estatus($estatus) {
        $this->estatus = $estatus;
    }

    function set_descripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

    function set_creado($creado) {
        $this->creado = $creado;
    }

    function set_modificado($modificado) {
        $this->modificado = $modificado;
    }

    function get_numero_ventas() {
        return self::$numero_ventas;
    }
    
    function get_numero_compras(){
        return self::$numero_compras;
    }
    function get_numero_compras_canceladas(){
        return self::$numero_compras_caceladas;
    }

    function aprobar($id) {
        $this->id = $id;
        $this->db->update(self::$tabla, array('estatus' => VENTA_EXITOSA), array('id' => $id));
    }

    function denegar($id) {
        $this->id = $id;
        $this->db->update(self::$tabla, array('estatus' => VENTA_CANCELADA), array('id' => $id));
    }

    function get_ventas_x_vendedor($vendedor_id) {
        $select = "a.id, a.comprador_id, a.vendedor_id, a.equipo_id, a.estatus, "
                . "b.nombre comprador, b.email, b.telefono, c.nombre equipo";
        $this->db->select($select);
        $this->db->from('ventas a ');
        $this->db->join('usuarios b', 'a.comprador_id = b.id');
        $this->db->join('equipos c', 'a.equipo_id = c.id');
        $cond = array('vendedor_id' => $vendedor_id, 'estatus' => VENTA_EN_PROCESO);
        $this->db->where($cond);
        $ventas_obj = $this->db->get();
        self::$numero_ventas = $ventas_obj->num_rows();
        return $ventas_obj->result();
    }

    function get_ventas_por_comprador($comprador_id) {
        $select = "a.id, a.comprador_id, a.vendedor_id, a.equipo_id, a.estatus, "
                . "b.nombre comprador, b.email, b.telefono, c.nombre equipo";
        $this->db->select($select);
        $this->db->from('ventas a ');
        $this->db->join('usuarios b', 'a.comprador_id = b.id');
        $this->db->join('equipos c', 'a.equipo_id = c.id');
        $cond = array('comprador_id' => $comprador_id, 'estatus' => VENTA_EXITOSA);
        $this->db->where($cond);
        //$this->db->or_where(array('estatus' => VENTA_CANCELADA));
        $ventas_obj = $this->db->get();
        self::$numero_compras = $ventas_obj->num_rows();
        return $ventas_obj->result();
    }
    
    function get_compras_canceladas($comprador_id) {
        $select = "a.id, a.comprador_id, a.vendedor_id, a.equipo_id, a.estatus, "
                . "b.nombre comprador, b.email, b.telefono, c.nombre equipo";
        $this->db->select($select);
        $this->db->from('ventas a ');
        $this->db->join('usuarios b', 'a.comprador_id = b.id');
        $this->db->join('equipos c', 'a.equipo_id = c.id');
        $cond = array('comprador_id' => $comprador_id, 'estatus' => VENTA_CANCELADA);
        $this->db->where($cond);
        $ventas_obj = $this->db->get();
        self::$numero_compras_caceladas = $ventas_obj->num_rows();
        return $ventas_obj->result();
    }

    function get_venta_x_id($id) {
        $select = "a.id, a.comprador_id, a.vendedor_id, a.equipo_id, a.estatus, "
                . "b.nombre comprador, b.email, b.telefono, c.nombre equipo, c.id equipo_id";
        $this->db->select($select);
        $this->db->from('ventas a ');
        $this->db->join('usuarios b', 'a.comprador_id = b.id');
        $this->db->join('equipos c', 'a.equipo_id = c.id');
        $this->db->where('a.id', $id);
        return $this->db->get()->row();
    }
    function get_venta_exitosa_x_id($id) {
        $select = "a.id, a.comprador_id, a.vendedor_id, a.equipo_id, a.estatus, "
                . "b.nombre comprador, b.email, b.telefono, c.nombre equipo, c.id equipo_id";
        $this->db->select($select);
        $this->db->from('ventas a ');
        $this->db->join('usuarios b', 'a.comprador_id = b.id');
        $this->db->join('equipos c', 'a.equipo_id = c.id');
        $this->db->where(array('a.id'=> $id, 'a.estatus'=>VENTA_EXITOSA));
        return $this->db->get()->row();
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
    
    function reporte($filtro = array()){
        $this->db->select("nombre_comprador, email_comprador, nombre_vendedor, email_vendedor, nombre_equipo, nombre_modelo, nombre_marca, nombre_color, precio, creado");
        $this->db->from("vista_ventas ");
        if (!empty($filtro)){
            $this->db->where($filtro);
        }
         return $this->db->get()->result();
        // echo $this->db->last_query();
    }

    function delete() {
        
    }

//    function __destruct() {
//        $usuario_id = $this->session->userdata('id');
//        $condicion = array('id' => $usuario_id);
//        $usuario = $this->db->get_where("usuarios", $condicion);
//        $this->load->model('Venta');
//        $u = $usuario->row();
//        $usuario_sess = array(
//            'ventas' => $this->Venta->get_ventas_x_vendedor($u->id),
//            'nro_ventas' => $this->Venta->get_numero_ventas(),
//            'compras' => $this->Venta->get_ventas_por_comprador($u->id),
//            'nro_compras' => $this->Venta->get_numero_compras(),
//            'compras_canceladas' => $this->Venta->get_compras_canceladas($u->id),
//            'nro_compras_candeladas' => $this->Venta->get_numero_compras_canceladas(),
//        );
//
//        $this->session->set_userdata($usuario_sess);
//    }

}
