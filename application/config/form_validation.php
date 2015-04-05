<?php

$config = array(
    'valid_usuario' =>
    array(
        'field' => 'nombre',
        'label' => 'Nombre',
        'rules' => 'required|max_length[150]'
    ),
    array(
        'field' => 'email',
        'label' => 'Email',
        'rules' => 'required|valid_email|max_length[100]'
    ),
    array(
        'field' => 'confirm-email',
        'label' => 'Confirmar Email',
        'rules' => 'required|matches[email]|max_length[100]'
    ),
    array(
        'field' => 'clave',
        'label' => 'password',
        'rules' => 'required|max_length[100]'
    ),
    array(
        'field' => 'telefono',
        'label' => 'telefono',
        'rules' => 'required|max_length[20]'
    ),
    
    'validacio_equipo' =>
    array(),
    array(),
    array(),
    array(),
);

