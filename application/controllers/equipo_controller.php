<?php

class Equipo_Controller extends CI_Controller {

    static $view_folder = "equipo";

    function __construct() {
        parent::__construct();
        $this->load->model('Equipo');
    }

    function index() {
      $this->listar();
    }

    function listar() {
        $data['Equipos'] = $this->Equipo->get_Equipos();
        $this->load->view(self::$view_folder . '/listar', $data);
    }

    function crear() {
        /* Inicializacion de modelos necesarios */
        $this->load->model('Marca');
        $this->load->model('Operadora');
        $this->load->model('Color');

        /*         * *********************************** */
        $data['marcas'] = $this->Marca->get_marcas();
        $data['operadoras'] = $this->Operadora->get_operadoras();
        $data['colores'] = $this->Color->get_colores();
        $data['colores'] = $this->Color->get_colores();
        $data['estados'] = array('N' => 'Nuevo', 'U' => 'Usado');
        $this->load->view(self::$view_folder . '/crear', $data);
    }

    function modificar($id) {
        /* Inicializacion de modelos necesarios */
        $this->load->model('Marca');
        $this->load->model('Operadora');
        $this->load->model('Color');
        $this->load->model('Modelo');
        
        /************************************* */
        $data['equipo'] = $this->Equipo->get_equipo_x_id($id);
        $data['modelo'] = $this->Modelo->get_modelo_x_id($data['equipo']->modelo_id);
        $data['marcas'] = $this->Marca->get_marcas();
        $data['modelos'] = $this->Modelo->get_modelo_x_marca_id($data['modelo']->marca_id);
        $data['operadoras'] = $this->Operadora->get_operadoras();
        $data['colores'] = $this->Color->get_colores();
        $data['estados'] = array('N' => 'Nuevo', 'U' => 'Usado');
        
        
        $this->load->view(self::$view_folder . '/modificar', $data);
    }

    function get_modelos_ajax($marca_id) {
        $this->load->model('Modelo');
        $data['modelos'] = $this->Modelo->get_modelo_x_marca_id($marca_id);
        $this->load->view(self::$view_folder . '/ajax/modelo_part', $data);
    }

    function request($id = null) {

        $this->Equipo->set_nombre($this->input->post('nombre'));
        $this->Equipo->set_modelo_id($this->input->post('modelo'));
        $this->Equipo->set_operadora_id($this->input->post('operadora'));
        $this->Equipo->set_usuario_id($this->input->post('usuario_id'));
        $this->Equipo->set_color_id($this->input->post('color'));
        $this->Equipo->set_precio($this->input->post('precio'));
        $this->Equipo->set_cantidad($this->input->post('cantidad'));
        $this->Equipo->set_estado($this->input->post('estado'));

        $upload_data = $this->subir_foto();
        if ($upload_data) {
            $url_img = $upload_data['base_url'] . 'upload/' . $upload_data['upload_data']['file_name'];
            $this->Equipo->set_imagen($url_img);
        }else {
             $this->Equipo->set_imagen($this->input->post('imagen_url'));
        }
        if ($id == null) {
            $id_insertado = $this->Equipo->insert();
            redirect(base_url('index.php/equipo_controller/modificar/' . $id_insertado));
        } else {
            $this->Equipo->set_id($id);
            $this->Equipo->update();
            $this->modificar($id);
        }
    }

    function subir_foto() {
        $config['upload_path'] = './upload/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '100';
        $config['max_width'] = '1024';
        $config['max_height'] = '768';
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload()) {
            $error = array('error' => $this->upload->display_errors());
            return FALSE;
        } else {
            $data = array('upload_data' => $this->upload->data());
            $data['base_url'] = base_url();
            return $data;
        }
    }
    
    
    function eliminar($id) {
        $this->Equipo->set_id($id);
        $this->Equipo->delete();
        $this->listar();
    }

}
