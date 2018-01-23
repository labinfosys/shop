<?php

namespace core;

define('BASE_PATH', realpath(__DIR__ . DIRECTORY_SEPARATOR . '..'));

class Autoloader
{
    static public function load($name)
    {
        $path = BASE_PATH . DIRECTORY_SEPARATOR . $name . '.php';
        if (file_exists($path))
            include($path);
    }
}