<?php
namespace core;

class Controller 
{
    public $title = 'My Shop';

    public function redirect($path)
    {
        header('Location: ' . $path);
        exit;
    }

    public function render($view, $params = [])
    {
        if (count($params) > 0) {
            foreach($params as $key => $value) {
                $$key = $value;
            }
        }
        ob_start();
        include '../views/' . $view . '.php';
        $html = ob_get_contents();
        ob_end_clean();
        include '../views/layout/main.php';
    }
}