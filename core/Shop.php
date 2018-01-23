<?php

namespace core;

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
            self::$app->db = Db::connect();
            // Инициализация маршрутизатора
            Router::route();
        }
        return self::$app;
    }

}