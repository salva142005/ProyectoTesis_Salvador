<?php

class Modelo_Controller extends CI_Controller {

    static $view_folder = "modelo";

    function __construct() {
        parent::__construct();
        $this->load->model('Modelo');
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger alert-dismissable"><i class="icon fa fa-ban"></i>', '</div>');
    }

    function index() {
        $this->listar();
    }

    function listar() {
        $data['modelos'] = $this->Modelo->get_modelos();
        $data['titulo'] = "Gestionar modelos";
        $this->load->view(self::$view_folder . '/listar', $data);
    }

    function request($id = null) {
        if ($id == null) {
            if (!$this->form_validation->run('validar_modelo')) {
                $this->crear();
                return;
            }
        }
        $this->Modelo->set_nombre($this->input->post('nombre'));
        $this->Modelo->set_marca_id($this->input->post('marca'));
        if ($id == null) {
            $this->Modelo->insert();
        } else {
            $this->Modelo->set_id($id);
            $this->Modelo->update();
        }
        redirect(base_url("index.php/modelo_controller/listar"));
    }

    function crear() {
        $data['marcas'] = $this->get_marcas();
        $this->load->view(self::$view_folder . '/crear', $data);
    }

    function modificar($id) {
        $data['marcas'] = $this->get_marcas();
        $data['modelo'] = $this->Modelo->get_modelo_x_id($id);
        $this->load->view(self::$view_folder . '/modificar', $data);
    }

    function eliminar($id) {
        $this->Modelo->set_id($id);
        $this->Modelo->delete();
        $this->listar();
    }

    function get_marcas() {
        $this->load->model('Marca');
        return $this->Marca->get_marcas();
    }

}
