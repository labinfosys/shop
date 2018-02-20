<?php
namespace core;

class Router
{
    static public function route()
    {
        if (!isset($_GET['r']))
            $route = explode('/', preg_replace('/\//', '', $_SERVER['REQUEST_URI'], 1));
        else
            $route = explode('/', $_GET['r']);

        if (!isset($route[0]) || $route[0] == '') {
            $route[0] = 'default';
        }

        $controllerName = ucfirst($route[0]) . 'Controller';
        if (!isset($route[1])) {
            $route[1] = 'index';
        }   
        $actionName = 'action' . ucfirst($route[1]);
        $actionParams = [];

        $controllerPath = '../controllers/' . $controllerName . '.php';
        if (file_exists($controllerPath)) {
            include_once $controllerPath;
        }

        $controller = new $controllerName();
        
        if (isset($_GET['r']))
            $params = $_GET;
        else {
            $params = $route;
            unset($params[0]);
            unset($params[1]);
        }

        unset($params['r']);
        call_user_func_array([$controller, $actionName], $params);
    }
}