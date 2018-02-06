<?php

namespace models;

use \core\Shop;
use \core\Model;

class Product extends Model
{

    public $tableName = 'product';
    public static $className = 'Product';

    public static function getById($id)
    {
        $model = new Product();
        $sql = 'select * from ' . $model->tableName . ' where id = ' . $id;
        $result = Shop::$app->db->query($sql);
        $row = $result->fetch(\PDO::FETCH_ASSOC);
        if ($row === false) return null;
        $model->attributes = $row;
        return $model;
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

    public function save()
    {
        // create product
        
    }
}