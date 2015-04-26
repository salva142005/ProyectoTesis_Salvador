<?php

class Venta_Controller extends CI_Controller {
    
    static $view_folder = "venta";
    
    function __construct() {
        parent::__construct();
        $this->load->model('Venta');
        $this->load->model('Equipo');
    }
    
    function index(){}
    
    function registrar_venta(){
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
        $data['venta']=$this->Venta->get_venta_x_id($id);
        $data['equipo'] = $this->Equipo->get_equipos($data['venta']->equipo_id);
        $this->load->view(self::$view_folder.'/ver_venta', $data);
    }
    
    function aprobar_venta($id){
        $this->Venta->aprobar($id);
        redirect(base_url());
    }
    
    function negar_venta($id){
        $this->Venta->denegar($id);
        $venta=$this->Venta->get_venta_x_id($id);
        
        $this->Equipo->aumetar_cantidad($venta->equipo_id);
        redirect(base_url());
    }
    
    
}
