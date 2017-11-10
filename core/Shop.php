<?php

class Shop 
{
    public static $app;

    public $config;
    public $db;

    public static function run($config) 
    {
        if (!(self::$app instanceof self)) {
            self::$app = new self();
            // Загрузка конфигурации
            self::$app->config = $config;
            // Подключение к БД
            self::$app->connect();
            // Инициализация маршрутизатора
            self::$app->route();
        }
        return self::$app;
    }

    public function route()
    {
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
        // $controller = new ProductController();
        $controller->$actionName($_GET['id']);
        // $controller->actionView(10);
    }

    public function connect()
    {   
        $connectionString = 'mysql:host=' . $this->config['database']['host'] 
        . ';dbname=' . $this->config['database']['dbname'] 
        . ';charset=' . $this->config['database']['charset'];

        try {
            $this->db = new PDO(
                $connectionString, 
                $this->config['database']['username'], 
                $this->config['database']['password']
            );
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
            die();
        }
    }
}