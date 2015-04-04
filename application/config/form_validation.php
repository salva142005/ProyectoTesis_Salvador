<?php

$config = array(
    array(
        'field' => 'nombre',
        'label' => 'Nombre',
        'rules' => 'required|max_length[150]'
    ),
    array(
        'field' => 'password',
        'label' => 'Password',
        'rules' => 'required'
    ),
    array(
        'field' => 'passconf',
        'label' => 'Password Confirmation',
        'rules' => 'required'
    ),
    array(
        'field' => 'email',
        'label' => 'Email',
        'rules' => 'required'
    )
);

