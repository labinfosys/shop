<?php
    function d($variable) 
    {
        echo '<pre>';
        var_dump($variable);
        echo '</pre>';
    }
    function dd($variable) 
    {
        d($variable);
        die();
    }

    $config = require '../config/web.php';

    require_once('../core/Shop.php');

    Shop::run($config);

    d(
        Shop::$app
    );