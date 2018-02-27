<?php

use common\models\Product;
use common\models\Category;
use common\models\Brand;
use core\Controller;

class ProductController extends Controller
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

    public function actionIndex($catId = null)
    {
        if (!is_null($catId))
            $_POST['Product']['category_id'] = $catId;
        if (isset($_POST['Product']))
            $products = Product::all($_POST['Product']);
        else
            $products = Product::all();
        $this->title = 'Все товары';
        $this->render('products/index', [
            'products'   => $products,
            'categories' => Category::all(),
            'brands'     => Brand::all()
        ]);
        // include '../views/products/index.php';
    }

    // public function actionCategory($id)
    // {
    //     $products = Product::
    // }

    public function actionPagination()
    {
        $page = isset($_GET['page']) ? $_GET['page'] : 1;
        $result = Product::byPage($page);
        $products = $result['products'];
        $pageCount = $result['pages'];
        include '../views/products/by-page.php';
    }
}