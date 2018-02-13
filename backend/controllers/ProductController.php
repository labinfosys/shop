<?php
use \common\models\Product;
use \core\Controller;

class ProductController extends Controller
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
            if ($product->save())
                $this->redirect('?r=product');          
        }
        include '../views/products/edit.php';
    }

    public function actionNew()
    {
        $created = false;
        if (isset($_POST['Product'])) {
            $product = new Product;
            $product->attributes = $_POST['Product'];
            // $created = $product->save();
            if ($product->save())
                $this->redirect('?r=product');          
        }
        include '../views/products/new.php';
    }

    public function actionDelete($id)
    {
        $product = Product::getById($id);
        if (isset($_POST['deleteActionYes'])) {
            $product->delete();
            $this->redirect('?r=product');
        } elseif (isset($_POST['deleteActionNo'])) {
            $this->redirect('?r=product');
        }
        include '../views/products/delete.php';
        // if (Product::getById($id)->delete())
        //     $this->redirect('?r=product');
        // echo 'Ошибка удаления. Товар не найден.';
    }
}