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

        }
        return self::$app;
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