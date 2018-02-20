<?php

namespace common\models;

use \core\Shop;
use \core\Model;

class Category extends Model
{

    public static $tableName = 'category';
    public static $className = 'Category';

    public static function all($filter = [])
    {
        $sql = 'select * from ' . self::$tableName . ' where 1=1 ';
        $result = [];
        foreach (Shop::$app->db->query($sql) as $row) {
            $category = new Category();
            $category->attributes = $row;
            $result[] = $category;
        }
        return $result;
    }
}