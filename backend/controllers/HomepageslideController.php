<?php

namespace backend\controllers;

class HomepageslideController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }
	
	public function actionAdd() {
		return $this->render("add");
	}

}
