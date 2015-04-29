<?php

$config = array(
    'validar_color' =>
    array(
        array(
            'field' => 'nombre',
            'label' => 'Color',
            'rules' => 'required|is_unique[colores.nombre]|max_length[45]'
        ),
    ),
    'validar_marca' =>
    array(
        array(
            'field' => 'nombre',
            'label' => 'Marca',
            'rules' => 'required|is_unique[marcas.nombre]|max_length[45]'
        ),
    ),
    'validar_modelo' =>
    array(
        array(
            'field' => 'nombre',
            'label' => 'Modelo',
            'rules' => 'required|is_unique[modelos.nombre]|max_length[45]'
        ),
        array(
            'field' => 'marca',
            'label' => 'Marca',
            'rules' => 'required'
        ),
    ),
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
    'valid_usuario2' =>
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
            'field' => 'clave',
            'label' => 'Clave',
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
            'rules' => 'required|numeric|max_length[13]',
        ),
        array(
            'field' => 'cantidad',
            'label' => 'Cantidad De Equipos Disponible',
            'rules' => 'required|numeric|max_length[13]'
        ),
    ),
   
    'validar_operadora' =>
    array(
        array(
            'field' => 'nombre',
            'label' => 'Nombre De La Marca',
            'rules' => 'required|max_length[60]'
        ),
    ),
    'validacion_modelo' =>
    array(
        array(
            'field' => 'nombre',
            'label' => 'Nombre Del Modelo',
            'rules' => 'required|max_length[45]'
        ),
        array(
            'field' => 'marca',
            'label' => 'Marca Del Modelo',
            'rules' => 'required|max_length[60]'
        ),
    ),
    'validacion_operadora' =>
    array(
        array(
            'field' => 'nombre',
            'label' => 'Nombre De la Operadora',
            'rules' => 'required|max_length[60]|is_unique[operadoras.nombre]'
        ),
    ),
);

