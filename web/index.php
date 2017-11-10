<?php

    $config = require '../config/web.php';

    require_once('../core/Shop.php');

    Shop::run($config);

    var_dump(
        Shop::$app->db
    );
    

    echo 'кодировка';