<?php
namespace core;

class Controller 
{
    public function redirect($path)
    {
        header('Location: ' . $path);
        exit;
    }
}