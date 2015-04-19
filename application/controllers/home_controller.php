<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of home_controller
 *
 * @author Raúl
 */
class Home_Controller extends CI_Controller {

    static $view_folder = 'home';

    function __construct() {
        parent::__construct();
        $this->load->model('Equipo');
    }

    function index() {
        $data['equipos']=$this->Equipo->get_equipos();
        $data['titulo_principal']="Listado de equipos";
        $data['titulo_secundario']="Inicio";
        $this->load->view(self::$view_folder . '/index', $data);
    }
    
    function listar_equipos_del_usuario(){
        if (!empty($this->session->userdata('id'))){
            $data['titulo_principal']="Mis equipos";
            $data['titulo_secundario']="Listado de mis equipos";
            $data['equipos']=$this->Equipo->get_equipos(null, true);
            $this->load->view(self::$view_folder . '/index', $data);
        } else{
            redirect(base_url("index.php/login_controller/"));
        }
    }
    
    function search(){
        $q = $this->input->get("q");
        if(empty($q)){
            $this->index();
            return;
        }
        $data['equipos']=$this->Equipo->get_equipos(null, false, $this->input->get("q"))->result();
        $data['titulo_principal']="Su búsqueda: <strong>\"".$this->input->get("q")."\"</strong> produjo ".$this->Equipo->get_equipos(null, false, $this->input->get("q"))->num_rows()." resultado(s)";
        //$data['titulo_secundario']='"'.$this->input->get("q").'"';
        $data['busqueda_string'] = $this->input->get("q");
        $data['numero_registros'] =$this->Equipo->numero_registros();
        
        $this->load->view(self::$view_folder . '/index', $data);
    }
    
    function listar() {
        $data['colores'] = $this->Color->get_colores();
        $this->load->view(self::$view_folder . '/listar', $data);
    }

    function crear() {
        $this->Color->set_nombre('Verde Olivo');
        $this->Color->insert();
    }

    function modificar($id) {
        $this->Color->set_id($id);
        $this->Color->set_nombre('Amarillo Pollito');
        $this->Color->update();
    }

    function eliminar($id) {
        $this->Color->set_id($id);
        $this->Color->delete();
        $this->listar();
    }

}
