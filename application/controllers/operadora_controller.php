<?php

class Operadora_Controller extends CI_Controller {
    
    static $view_folder = "operadora";
}
   
    function __construct() {
        parent::__construct();
    }
    
    function index(){
        $this->load->model('Operadora');
        $r = $this->Operadora->listar();
         echo "<pre>";
        print_r($r->result_array());
       
    }
function listar(){
        $data['Operadoras'] = $this->Operadora->get_Operadoras();
        $this->load->view(self::$view_folder.'/listar', $data);
    }
    
    function crear(){
        $this->Operadora->set_nombre('Verde Olivo');
        $this->Operadora->insert();
    }
    
    function modificar($id){
        $this->Operadora->set_id($id);
        $this->Operadora->set_nombre('Amarillo Pollito');
        $this->Operadora->update();
        
    }
    
    function eliminar($id){
         $this->Operadora->set_id($id);
         $this->Operadora->delete();
         $this->listar();
    } 