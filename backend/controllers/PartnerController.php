<?php

namespace backend\controllers;

class PartnerController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }
    
    public function actionEdit() {
        return $this->render('edit');
    }
    
    public function actionAdd() {
        return $this->render('add');
    }
    
    public function actionView() {
        return $this->render("view");
    }
    
    public function actionApplication() {
        return $this->render("application");
    }

}
