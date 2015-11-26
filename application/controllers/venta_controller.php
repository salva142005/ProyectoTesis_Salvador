<?php

class Venta_Controller extends CI_Controller {
    
    static $view_folder = "venta";
    
    function __construct() {
        parent::__construct();
        $this->load->model('Venta');
        $this->load->model('Equipo');
    }
    
    function index(){echo 'hola';}
    
    function registrar_venta(){
        error_reporting(~E_WARNING);
        $equipo_id = $this->input->post('equipo_id');
        $this->Venta->set_comprador_id($this->input->post('comprador_id'));
        $this->Venta->set_vendedor_id($this->input->post('vendedor_id'));
        $this->Venta->set_equipo_id($equipo_id);
        $this->Venta->set_estatus(VENTA_EN_PROCESO);
        $this->Venta->insert();
        $this->Equipo->descontar_cantidad_equipo($equipo_id);
        $data['equipo'] = $this->Equipo->get_equipos($equipo_id);
        $data['mensaje_venta_registrada'] ='Su compra ha sido registrada exitosamente. Verifique los datos de su compra.'
                . 'Su compra esta en proceso';
        $this->load->view(self::$view_folder.'/venta_registrada', $data);
    }
    
    function ver_venta($id){
        error_reporting(~E_WARNING);
        $data['venta']=$this->Venta->get_venta_x_id($id);
        $data['equipo'] = $this->Equipo->get_equipos($data['venta']->equipo_id);
        $this->load->view(self::$view_folder.'/ver_venta', $data);
    }
    function ver_compra($id){
        error_reporting(~E_WARNING);
        $data['venta']=$this->Venta->get_venta_exitosa_x_id($id);
        $data['equipo'] = $this->Equipo->get_equipos($data['venta']->equipo_id);
        $this->load->view(self::$view_folder.'/ver_venta_exitosa', $data);
    }
    
    function aprobar_venta($id){
        $this->Venta->aprobar($id);
        redirect(base_url());
    }
    
    function negar_venta($id){
        $this->Venta->denegar($id);
        $venta=$this->Venta->get_venta_x_id($id);
        
        $this->Equipo->aumentar_cantidad($venta->equipo_id);
        redirect(base_url());
    }
    
    function vista_reporte(){
        //error_reporting(~E_WARNING);
        $data["titulo"] = "Reporte de ventas";
        $data["usuarios"] = $this->_get_usuarios();
        $data["estatus_ventas"] = $this->_get_esttatus_ventas();
        $usuario = $this->input->post("usuario");
        $fecha_ini = $this->input->post("fecha_inicio");
        $fecha_fin = $this->input->post("fecha_fin");
        $estatus_ventas = $this->input->post("estatus_ventas");
        if ($this->input->post("usuario") == "" && $this->input->post("fecha_inicio") == "" && $this->input->post("fecha_fin") ==""){
            $this->load->view(self::$view_folder."/reporte", $data);
            return;
        }
        $filtro = array();
        if ($usuario != ""){
            $filtro["email_vendedor"] = $usuario;
        }
        if ($fecha_ini == $fecha_fin){
           $filtro["CAST(creado AS DATE) ="] = $fecha_ini;
        } else {
            if ($fecha_ini != ""){
                $filtro["creado >="] = $fecha_ini;
            }
            if ($fecha_fin != ""){
                $filtro["creado <="] = $fecha_fin;
            }
        }
        $filtro['estatus ='] = $estatus_ventas;
        $data["ventas"] = $this->Venta->reporte($filtro);
        $this->load->view(self::$view_folder."/reporte", $data);
    }
    
    function _get_usuarios(){
        $this->load->model("Usuario");
        return $this->Usuario->get_all();
    }
    
    function _get_esttatus_ventas(){
        return [
                '1' => 'Ventas Aprobadas',
                '0' => 'Ventas Rechazadas',
                '2' => 'Ventas por Aprobar'
            ];
    }
    
}
