<?php

namespace backend\controllers;

class ResourceController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

}
