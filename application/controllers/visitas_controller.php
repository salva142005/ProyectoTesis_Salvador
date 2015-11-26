<?php


class Visitas_Controller extends CI_Controller{
    
    function __construct() {
        parent::__construct();
    }
    
    function index(){
        $this->load->model('Visita');
        $data['nro_visitas']=$this->Visita->get_numero_visitas();
        $data['titulo'] = 'Cantidad de visitas';
        $this->load->view('visitas/index', $data);
    }
}
