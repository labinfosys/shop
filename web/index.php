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

    define('BASE_PATH', realpath(__DIR__ . DIRECTORY_SEPARATOR . '..'));

    function shop_autoload($name)
    {
        $path = BASE_PATH . DIRECTORY_SEPARATOR . $name . '.php';
        if (file_exists($path))
            include($path);
    }
    spl_autoload_register('shop_autoload');

    $config = require '../config/web.php';

    require_once('../core/Shop.php');

    \core\Shop::run($config);