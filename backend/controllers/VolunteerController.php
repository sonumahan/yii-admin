<?php

namespace backend\controllers;

class VolunteerController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }
    
    public function actionAdd() {
        return $this->render('add');
    }
    
    public function actionEdit() {
        return $this->render('edit');
    }

}
