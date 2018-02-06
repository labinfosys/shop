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

    require_once '../core/Autoloader.php';
    spl_autoload_register('\core\Autoloader::load');

    $config = require '../config/web.php';

    \core\Shop::run($config);