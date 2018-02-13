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

        if (isset($_POST['Product'])) {
            $product->attributes = array_merge($product->attributes, $_POST['Product']);
            $product->save();
        }
        include '../views/products/edit.php';
    }

    public function actionNew()
    {
        $created = false;
        if (isset($_POST['Product'])) {
            $product = new Product;
            $product->attributes = $_POST['Product'];
            $created = $product->save();
        }
        include '../views/products/new.php';
    }
}