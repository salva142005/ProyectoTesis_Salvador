<?php

$config = array(
    'valid_usuario' =>
    array(
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
    ),
    'validacion_equipo' =>
    array(
        array(
            'field' => 'nombre',
            'label' => 'Descripción del equipo',
            'rules' => 'required|max_length[225]'
        ),
        array(
            'field' => 'precio',
            'label' => 'Precio del equipo',
            'rules' => 'required|numeric|max_length[13]'    
        ),
        array(
            'field' => 'Cantidad',
            'label' => 'Cantidad De Equipos Disponible',
            'rules' => 'required|numeric|max_length[13]'
        )
    ),
    'validacion_marca' =>
    array(
        array(
            'field' => 'nombre',
            'label' => 'Nombre De La Marca',
            'rules' => 'required|max_length[60]'
        )
    )
);

