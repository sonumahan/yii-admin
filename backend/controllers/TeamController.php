<?php

namespace backend\controllers;

class TeamController extends \yii\web\Controller
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
