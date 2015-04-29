<?php

class Marca_Controller extends CI_Controller {

    static $view_folder = "marca";

    function __construct() {
        parent::__construct();
        $this->load->model('Marca');
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger alert-dismissable"><i class="icon fa fa-ban"></i>', '</div>');
    }

    function index() {
        $this->listar();
    }

    function listar() {
        $data['marcas'] = $this->Marca->get_marcas();
        $data['titulo'] = "Gestionar Marcas";
        $this->load->view(self::$view_folder . '/listar', $data);
    }

    function request($id = null) {
        if (!$this->form_validation->run('validar_marca')){
            $this->crear();
            return;
        }
        $this->Marca->set_nombre($this->input->post('nombre'));
        if ($id == null) {
            $this->Marca->insert();
        } else {
            $this->Marca->set_id($id);
            $this->Marca->update();
        }
        redirect(base_url("index.php/marca_controller/listar"));
    }

    function crear() {
         $this->load->view(self::$view_folder.'/crear');
    }

    function modificar($id) {
        $data['marca'] = $this->Marca->get_marca_x_id($id);
        $this->load->view(self::$view_folder . '/modificar', $data);
    }

    function eliminar($id) {
        $this->Marca->set_id($id);
        $this->Marca->delete();
        $this->listar();
    }

}
