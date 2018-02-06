<?php

namespace models;

use \core\Shop;

class Brand 
{
    public $attributes;

    public static function all()
    {
        $sql = 'select distinct brand as name from product';
        $result = [];
        foreach (Shop::$app->db->query($sql) as $row) {
            $brand = new Product();
            $brand->attributes = $row;
            $result[] = $brand;
        }
        return $result;
    }
}