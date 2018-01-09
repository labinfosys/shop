<?php

namespace models;

use \core\Shop;

class Product 
{
    public $attributes;

    public static function getById($id)
    {
        $product = new Product();
        $sql = 'select * from product where id = ' . $id;
        $result = Shop::$app->db->query($sql);
        $row = $result->fetch(\PDO::FETCH_ASSOC);
        if ($row === false) return null;
        $product->attributes = $row;
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
                if (is_array($value))
                    $sql .= ' and ' . $key . ' in (\'' . implode('\', \'', $value) . '\')';
                else
                    $sql .= ' and ' . $key . ' like \'%' . $value . '%\'';
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

    public static function byPage($page = 1)
    {
        $pageSize = 5;
        $products = self::all();
        $total = count($products);
        $result = [];
        $from = ($page - 1) * $pageSize;
        $to   = $from + $pageSize;
        if ($to > $total) $to = $total;
        for ($i = $from; $i < $to; $i++) {
            $result[] = $products[$i];
        }
        return [
            'products' => $result,
            'pages'    => ceil($total / $pageSize)
        ];
    }
}