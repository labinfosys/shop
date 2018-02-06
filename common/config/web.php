<?php
    return [
        'database' => [
            'host' => 'localhost',
            'dbname'   => 'phpshop',
            'username' => 'root',
            'password' => '',
            'charset'  => 'utf8',
        ],
        'prettyUrl' => true,
        'routes' => [
            'product' => 'product/index',
            'product/view([\d]+)' => 'product/view'
        ]
    ];