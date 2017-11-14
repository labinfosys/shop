<?php

namespace models;

class Product 
{
    public $id;
    public $name;
    public $price;

    public static function getById($id)
    {
        // ... загрузка из БД
        $product = new Product();
        $product->id = $id;
        // ... заполнение свойств
        return $product;
    }

    public static function find()
    {
        // ... загрузка из БД
        $result = [];
        /*
        while (....) {
            $product = new Product();
            // ... заполнение свойств
            $result[] = $product;
        }
        */
        return $result;
    }
}