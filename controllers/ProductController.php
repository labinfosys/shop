<?php

use \models\Product;
use \models\Brand;

class ProductController
{
    public function actionView($id)
    {
        $product = Product::getById($id);
        if (is_null($product)) {
            echo "Продукт с id = $id не найден";
            return;
        }
        include '../views/products/view.php';
    }

    public function actionIndex()
    {
        if (isset($_POST['Product']))
            $products = Product::all($_POST['Product']);
        else
            $products = Product::all();

        $brands = Brand::all();
        include '../views/products/index.php';
        // include BASE_PATH . DIRECTORY_SEPARATOR . 'views/products/index.php';
    }
}