<?php

use \models\Product;
// require_once '../models/Product.php';

class ProductController
{
    public function actionView($id)
    {
        $prod = Product::getById($id);
        d($prod);
    }

    public function actionIndex()
    {
        echo 'все товары';
    }
}