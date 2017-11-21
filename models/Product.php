<?php

namespace models;

use \core\Shop;

class Product 
{
    public $attributes;

    public static function getById($id)
    {
        // ... загрузка из БД
        $product = new Product();
        $product->id = $id;
        // ... заполнение свойств
        return $product;
    }

    public function __get($name)
    {
        if (isset($this->attributes[$name]))
            return $this->attributes[$name];
        return null;
    }

    public static function all($filter = [])
    {
        $sql = 'select * from product where 1=1 ';
        if (count($filter) > 0) {
            foreach($filter as $key => $value) {
                $sql = $sql . ' and ' . $key . ' like \'%' . $value . '%\'';
            }
        }
        $result = [];
        foreach (Shop::$app->db->query($sql) as $row) {
            $product = new Product();
            $product->attributes = $row;
            $result[] = $product;
        }
        return $result;
    }
}