<?php

$config = array(
    array(
        'field' => 'nombre',
        'label' => 'Nombre',
        'rules' => 'required|max_length[150]'
    ),
    array(
        'field' => 'email',
        'label' => 'Email',
        'rules' => 'required|valid_email'
    ),
    array(
        'field' => 'confirm-email',
        'label' => 'Confirmar Email',
        'rules' => 'required|matches[email]'
    ),
    array(
        'field' => 'clave',
        'label' => 'password',
        'rules' => 'required'
    ),
);

