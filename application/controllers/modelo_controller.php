<?php

class Modelo_Controller extends CI_Controller {
    
    static $view_folder = "modelo";
}
   
    function __construct() {
        parent::__construct();
    }
    
    function index(){
        $this->load->model('Modelos');
        $r = $this->modelos->listar();
         echo "<pre>";
        print_r($r->result_array());
       
    }
 function listar(){
        $data['modelos'] = $this->modelo->get_modelos();
        $this->load->view(self::$view_folder.'/listar', $data);
    }
    
    function crear(){
        $this->modelo->set_nombre('Verde Olivo');
        $this->modelo->insert();
    }
    
    function modificar($id){
        $this->modelo->set_id($id);
        $this->modelo->set_nombre('Amarillo Pollito');
        $this->modelo->update();
        
    }
    
    function eliminar($id){
         $this->modelo->set_id($id);
         $this->modelo->delete();
         $this->listar();
    } 