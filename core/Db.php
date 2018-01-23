<?php

namespace core;

class Db 
{
    public static function connect()
    {
        $connection = false;
        $config = Shop::$app->config;
        $connectionString = 'mysql:host=' . $config['database']['host'] 
        . ';dbname=' . $config['database']['dbname'] 
        . ';charset=' . $config['database']['charset'];

        try {
            $connection = new \PDO(
                $connectionString, 
                $config['database']['username'],
                $config['database']['password']
            );
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
            die();
        }        
        return $connection;
    }
}