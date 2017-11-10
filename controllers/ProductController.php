<?php

require_once '../models/Product.php';

class ProductController
{
    public function actionView($id)
    {
        $prod = Product::getById($id);
        var_dump($prod);
        // include('product/view');
        // return $this->render('product/view', [
        //     'product' => $prod
        // ]);
    }

    public function actionIndex()
    {
        echo 'все товары';
    }
}