<?php

class Repuesto_Controller extends CI_Controller {
    
    static $view_folder = "repuesto";
}
   
    function __construct() {
        parent::__construct();
        
    }
        function index(){
        $this->load->model('Repuestoss');
        $r = $this->repuestos->listar();
         echo "<pre>";
        print_r($r->result_array());
    
   function listar(){
        $data['Repuestos'] = $this->Repuesto->get_Repuestos();
        $this->load->view(self::$view_folder.'/listar', $data);
    }
    
    function crear(){
        $this->Repuesto->set_nombre('Verde Olivo');
        $this->Repuesto->insert();
    }
    
    function modificar($id){
        $this->Repuesto->set_id($id);
        $this->Repuesto->set_nombre('Amarillo Pollito');
        $this->Repuesto->update();
        
    }
    
    function eliminar($id){
         $this->Repuesto->set_id($id);
         $this->Repuesto->delete();
         $this->listar();
    } 