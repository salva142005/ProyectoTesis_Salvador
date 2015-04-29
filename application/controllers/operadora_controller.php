<?php

class Operadora_Controller extends CI_Controller {

    static $view_folder = "operadora";

    function __construct() {
        parent::__construct();
        $this->load->model('Operadora');
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger alert-dismissable"><i class="icon fa fa-ban"></i>', '</div>');
    }

    function index() {
        $this->listar();
    }

    function listar() {
        $data['operadoras'] = $this->Operadora->get_operadoras();
        $data['titulo'] = "Gestionar Operadoras";
        $this->load->view(self::$view_folder . '/listar', $data);
    }
    
    function request($id = null){
         if (!$this->form_validation->run('validar_operadora')){
            $this->crear();
            return;
        }
        $this->Operadora->set_nombre($this->input->post('nombre'));
        if ($id == null){
            $this->Operadora->insert(); 
        } else {
           $this->Operadora->set_id($id);
           $this->Operadora->update();
        }
        redirect(base_url("index.php/operadora_controller/listar"));
    }

    function crear() {
        $this->load->view(self::$view_folder.'/crear');
    }

    function modificar($id) {
       $data['operadora']=$this->Operadora->get_operadora_x_id($id);
       $this->load->view(self::$view_folder.'/modificar', $data);
    }

    function eliminar($id) {
        $this->Operadora->set_id($id);
        $this->Operadora->delete();
        $this->listar();
    }

}
