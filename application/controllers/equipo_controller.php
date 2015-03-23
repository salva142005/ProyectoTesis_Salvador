<?php

class Equipo_Controller extends CI_Controller {

    static $view_folder = "equipo";

    function __construct() {
        parent::__construct();
    }

    function index() {
        $this->load->model('Equipos');
        $r = $this->equipos->listar();
        echo "<pre>";
        print_r($r->result_array());
    }

    function listar() {
        $data['Equipos'] = $this->Equipo->get_Equipos();
        $this->load->view(self::$view_folder . '/listar', $data);
    }

    function crear() {
        $this->Equipo->set_nombre('Verde Olivo');
        $this->Equipo->insert();
    }

    function modificar($id) {
        $this->Equipo->set_id($id);
        $this->Equipo->set_nombre('Amarillo Pollito');
        $this->Equipo->update();
    }

    function eliminar($id) {
        $this->Equipo->set_id($id);
        $this->Equipo->delete();
        $this->listar();
    }

}
