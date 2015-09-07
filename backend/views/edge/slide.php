<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
use yii\helpers\Html;
use yii\grid\GridView;

$this->title = "Course : ".$courseModel->name .' - Slide Listing';
$this->params["breadcrumbs"][] = ["url"=>"/admin/edge","label"=>"Edge"];
$this->params["breadcrumbs"][] = $this->title;
?>
<div class="edge-course-index">
    <h1><?= Html::encode($this->title) ?></h1>
    <p>
        <?= Html::a('Add Slide', ['updateslide',"cID"=>Yii::$app->request->getQueryParam("id")], ['class' => 'btn btn-primary']) ?>
    </p>
    <?= GridView::widget([
        "dataProvider" => $dataProvider,
        "columns" => [
            "week",
            "title",
            'status',
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => "{view}{update}{delete}",
                'buttons' => [
                    "view" => function($url,$model) {
                        $url = "/admin/edge/viewslide/".$model->id;
                        return Html::a('<span class="glyphicon glyphicon-eye-open"></span>', $url,["data-pjax"=>"0","aria-label"=>"View","title"=>"View"]);
                    },
                    "update" => function($url,$model) {
                        $url = "/admin/edge/updateslide/".$model->id.'?cID='.$model->course_id;
                        return Html::a('<span class="glyphicon glyphicon-pencil"></span>', $url,["data-pjax"=>"0","aria-label"=>"Update","title"=>"Update"]);
                    },
                    "delete" => function($url,$model) {
                        $url = "/admin/edge/deleteslide/".$model->id;
                        return Html::a('<span class="glyphicon glyphicon-trash"></span>', $url,["data-pjax"=>"0","aria-label"=>"Delete","title"=>"Delete","data-method"=>"post","data-confirm"=>"Are you sure you want to delete this item?"]);
                    }
                ],
            ],
        ]
    ])
        
    ?>
</div>
