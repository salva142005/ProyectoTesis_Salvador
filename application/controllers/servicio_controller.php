<?php

class Servicio_Controller extends CI_Controller {

    static $view_folder = "servicio";

    function __construct() {
        parent::__construct();
        $this->load->model('Servicio');
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger alert-dismissable"><i class="icon fa fa-ban"></i>', '</div>');
    }

    function index() {
        $this->listar();
    }

    function ver_detalle($id) {
        $data['servicio'] = $this->Servicio->get_servicio_x_id($id);
        $this->load->view(self::$view_folder . '/detalle', $data);
    }

    function listar() {
        $data['servicios'] = $this->Servicio->get_servicios();
        $this->load->view(self::$view_folder . '/listar', $data);
    }

    function crear() {
        $this->load->view(self::$view_folder . '/crear');
    }

    function modificar($id) {
        $data['servicio'] = $this->Servicio->get_servicio_x_id($id);
        $this->load->view(self::$view_folder . '/modificar', $data);
    }

    function eliminar($id) {
        $this->Servicio->set_id($id);
        $this->Servicio->delete();
        redirect('index.php/servicio_controller/');
    }

    function request($id = null) {
        if (!$this->form_validation->run('validacion_servicio')) {
            if ($id == null) {
                $this->crear();
            } else {
                $this->modificar($id);
            }
            return;
        }

        $this->Servicio->set_descripcion($this->input->post('descripcion'));
        if ($this->input->post('precio') != ''){
            $this->Servicio->set_precio($this->input->post('precio'));
        }else {
            $this->Servicio->set_precio(0);
        }
        $this->Servicio->set_usuario_id($this->input->post('usuario_id'));
        if ($id == null) {
            $ultimo_id = $this->Servicio->insert();
            $this->session->set_flashdata('mensaje', 'El servicio ha sido creado con éxito');
            redirect('index.php/servicio_controller/modificar/' . $ultimo_id);
        } else {
            $this->Servicio->set_id($id);
            $this->Servicio->update();
            $this->session->set_flashdata('mensaje', 'El servicio ha sido modificado con éxito');
            redirect('index.php/servicio_controller/modificar/' . $id);
        }
    }

}
