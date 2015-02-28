<?php

class Servicio_Controller extends CI_Controller {
    
    static $view_folder = "servicio";
}
   
    function __construct() {
        parent::__construct();
    }
    
    function index(){
        $this->load->model('Servicios');
        $r = $this->servicios->listar();
         echo "<pre>";
        print_r($r->result_array());
       
    }
   function listar(){
        $data['Servicios'] = $this->Servicio->get_Servicios();
        $this->load->view(self::$view_folder.'/listar', $data);
    }
    
    function crear(){
        $this->Servicio->set_nombre('Verde Olivo');
        $this->Servicio->insert();
    }
    
    function modificar($id){
        $this->Servicio->set_id($id);
        $this->Servicio->set_nombre('Amarillo Pollito');
        $this->Servicio->update();
        
    }
    
    function eliminar($id){
         $this->Servicio->set_id($id);
         $this->Servicio->delete();
         $this->listar();
    }