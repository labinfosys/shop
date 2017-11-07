<?php

class ProductController
{
    public function actionView($id)
    {
        $prod = Product::getById($id);
        // include('product/view');
        // return $this->render('product/view', [
        //     'product' => $prod
        // ]);
    }
}