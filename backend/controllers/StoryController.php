<?php

namespace backend\controllers;

class StoryController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }
    
    public function actionEdit() {
        return $this->render("edit");
    }

}
