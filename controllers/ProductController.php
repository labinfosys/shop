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
        if (isset($_POST['Product']))
            $products = Product::all($_POST['Product']);
        else
            $products = Product::all();
        include '../views/products/index.php';
        // include BASE_PATH . DIRECTORY_SEPARATOR . 'views/products/index.php';
    }
}