<?php

class Shop 
{
    public static $app;

    public $config;

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
        echo $this->config['db']['host'];
        echo '::connect';
    }

}