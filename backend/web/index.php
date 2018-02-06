<?php
    require_once '../../core/Autoloader.php';
    spl_autoload_register('\core\Autoloader::load');

    $config = require '../../backend/config/web.php';

    \core\Shop::run($config);