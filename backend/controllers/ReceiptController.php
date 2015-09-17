<?php

namespace backend\controllers;
use Yii;
use backend\components\Controller;
class ReceiptController extends Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }
    
    public function actionEdit() {
        return $this->render("edit");
    }
    
    public function actionAdd() {
        return $this->render("add");
    }

}
