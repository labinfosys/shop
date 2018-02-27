<?php
use core\Controller;

class DefaultController extends Controller
{
    public function actionIndex()
    {
        $this->render('default/index');
    }
}