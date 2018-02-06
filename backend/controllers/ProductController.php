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
            // var_dump($product->attributes);
            $product->save();
        }
        include '../views/products/edit.php';
    }
}