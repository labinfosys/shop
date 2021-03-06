<?php

namespace common\models;

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
        $sql = 'select product.*, category.name cat_name from product, category where product.category_id = category.id ';
        if (count($filter) > 0) {
            foreach($filter as $key => $value) {
                if (is_array($value))
                    $sql .= ' and product.' . $key . ' in (\'' . implode('\', \'', $value) . '\')';
                else
                    $sql .= ' and product.' . $key . ' like \'%' . $value . '%\'';
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
        if (isset($this->attributes['id'])) {
            // update product   
            $sql = 'update ' . $this->tableName . ' set '
                . '`name` = \'' . $this->name . '\', '
                . '`category_id` = ' . $this->category_id . ', '
                . '`code` = ' . $this->code . ', '
                . '`price` = ' . $this->price . ', '
                . '`availability` = ' . $this->availability . ', '
                . '`brand` = \'' . $this->brand . '\', '
                . '`description` = \'' . $this->description . '\', '
                . '`is_new` = ' . $this->is_new . ', '
                . '`is_recommended` = ' . $this->is_recommended . ', '
                . '`status` = ' . $this->status . ''
                . ' where id = ' . $this->id;
            $result = Shop::$app->db->query($sql);
            return $result !== false;
        } else {
            // insert product
            $sql = "INSERT INTO {$this->tableName}( name, category_id, 
			code, price , availability, brand) VALUES ('{$this->name}', '{$this->category_id}',
			'{$this->code}', '{$this->price}',
			'{$this->availability}', '{$this->brand}')";
               
            $result = Shop::$app->db->query($sql);
            return $result !== false;
        }
    }

    public function delete()
    {
        if (isset($this->attributes['id'])) {            
            $sql = "DELETE FROM {$this->tableName} WHERE id = {$this->id}";
            $result = Shop::$app->db->query($sql);
            return $result !== false;   
        }
        return false;
    }
}