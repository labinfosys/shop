<?php
    require_once '../../core/Autoloader.php';
    spl_autoload_register('\core\Autoloader::load');

    $config = require '../../frontend/config/web.php';

    \core\Shop::run($config);