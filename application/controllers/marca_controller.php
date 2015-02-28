<?php

class Marca_Controller extends CI_Controller {
    
    static $view_folder = "marca";
}
   
    function __construct() {
        parent::__construct();
    }
    
    function index(){
        $this->load->model('Marcas');
        $r = $this->marcas->listar();
         echo "<pre>";
        print_r($r->result_array());
       
    }
function listar(){
        $data['Marcas'] = $this->Marca->get_Marcas();
        $this->load->view(self::$view_folder.'/listar', $data);
    }
    
    function crear(){
        $this->Marca->set_nombre('Verde Olivo');
        $this->Marca->insert();
    }
    
    function modificar($id){
        $this->Marca->set_id($id);
        $this->Marca->set_nombre('Amarillo Pollito');
        $this->Marca->update();
        
    }
    
    function eliminar($id){
         $this->Marca->set_id($id);
         $this->Marca->delete();
         $this->listar();
    } 