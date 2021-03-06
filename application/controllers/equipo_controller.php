<?php

class Equipo_Controller extends CI_Controller {

    static $view_folder = "equipo";

    function __construct() {
        parent::__construct();
        $this->load->model('Equipo');
         $this->form_validation->set_error_delimiters('<div class="alert alert-danger alert-dismissable"><i class="icon fa fa-ban"></i>', '</div>');
    }

    function index() {
      $this->listar();
    }

    function listar() {
        $data['Equipos'] = $this->Equipo->get_Equipos();
        $this->load->view(self::$view_folder . '/listar', $data);
    }

    function crear() {
        $id = $this->session->userdata('id');
        if (empty($id)){
            redirect(base_url());
        }
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
        if(!$this->form_validation->run('validacion_equipo')){
            if ($id==null){
                $this->crear();
            } else {
                $this->modificar($id);
            }
            return;
        }
        $this->Equipo->set_nombre($this->input->post('nombre'));
        $this->Equipo->set_modelo_id($this->input->post('modelo'));
        $this->Equipo->set_operadora_id($this->input->post('operadora'));
        $this->Equipo->set_usuario_id($this->input->post('usuario_id'));
        $this->Equipo->set_color_id($this->input->post('color'));
        $this->Equipo->set_precio($this->input->post('precio'));
        $this->Equipo->set_cantidad($this->input->post('cantidad'));
        $this->Equipo->set_estado($this->input->post('estado'));
        $this->Equipo->set_activo(1);

        $upload_data = $this->subir_foto();
        if ($upload_data) {
            $url_img = $upload_data['base_url'] . 'upload/' . $upload_data['upload_data']['file_name'];
            $this->Equipo->set_imagen($url_img);
        }else {
             $this->Equipo->set_imagen($this->input->post('imagen_url'));
        }
        if ($id == null) {
            $id_insertado = $this->Equipo->insert();
            $this->session->set_flashdata('mensaje_equipo_guardado', 'Su equipo ha sido guardado exitosamente');
            redirect('index.php/equipo_controller/modificar/'.$id_insertado);
            
            
        } else {
            $this->Equipo->set_id($id);
            $this->Equipo->update();
            $this->session->set_flashdata('mensaje_equipo_guardado', 'Su equipo ha sido editado exitosamente');
            redirect('index.php/equipo_controller/modificar/' . $id);
        }
        
    }

    function subir_foto() {
        $config['upload_path'] = './upload/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '10000';
        $config['max_width'] = '20000';
        $config['max_height'] = '20000';
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
    
    function detalle($id){
        $data['comprador_id'] = $this->session->userdata('id');
        $data['equipo']=$this->Equipo->get_equipos($id);
        $this->load->view(self::$view_folder.'/detalle', $data);
    }
    
    function eliminar($id) {
       
       
         if($this->Equipo->desactivar($id)){
            $this->session->set_flashdata('mensaje_equipo_eliminado', 'Su equipo ha sido desactivado');
            redirect('index.php');
         }
        
        
        $data = array(
            "titulo" => 'Error',
            "actionRedirect" => 'equipo_controller/listar',
            "mensaje" => 'No se puede desacctivar este equipo'
        );
        $this->load->view("error_views", $data);
        
         
    }

}
