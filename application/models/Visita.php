<?php

class Visita extends CI_Model{
    
    var $id;
    var $ip;
    
    function __construct() {
        parent::__construct();
    }

    function get_id() {
        return $this->id;
    }

    function get_ip() {
        return $this->ip;
    }

 

    function set_id($id) {
        $this->id = $id;
    }

    function set_ip($ip) {
        $this->ip = $ip;
    }
    
    function get_all(){
        return $this->db->get('visitas');
    }
    
    function guardar(){
        $this->db->insert('visitas',$this);
    }
}
