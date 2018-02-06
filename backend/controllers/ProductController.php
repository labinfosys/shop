<?php
use \common\models\Product;

class ProductController
{
    public function actionIndex()
    {
        $products = Product::all();
        include '../views/products/index.php';
    }

    public function actionEdit($id)
    {
        $product = Product::getById($id);
        include '../views/products/edit.php';
    }
}