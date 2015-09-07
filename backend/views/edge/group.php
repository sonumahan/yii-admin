<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
use yii\helpers\Html;
use yii\grid\GridView;

$this->title = $courseModel->name.' : Manage Group';
$this->params["breadcrumbs"][] = ["label" => "Edge","url"=>"/admin/edge/"];
$this->params["breadcrumbs"][] = $this->title;
?>
<div class="">
    <h1><?php echo Html::encode($this->title); ?></h1>
    <p><?php echo Html::a("Add Group", ["/edge/groupadd","cID"=>$courseModel->course_id], ["class"=>"btn btn-primary"]);?></p>
    <?=    GridView::widget([
        "dataProvider" => $dataProvider,
        "columns" => [
            "name",
            [
                'class' => 'yii\grid\ActionColumn',
                "template" => "{update}{delete}",
                "buttons" => [
                    "update" => function($url,$model) {
                        $url = "/admin/edge/groupadd/".$model->group_id."?cID=".$model->course_id;
                        return Html::a('<span class="glyphicon glyphicon-pencil"></span>', $url,["data-pjax"=>"0","aria-label"=>"Update","title"=>"Update"]);
                    },
                    "delete" => function($url,$model) {
                        $url = "/admin/edge/groupdelete/".$model->group_id;
                        return Html::a('<span class="glyphicon glyphicon-trash"></span>',$url,["data-pjax"=>"0","data-method"=>"post","data-confirm"=>"Are you sure you want to delete this item?"," aria-label"=>"Delete","title"=>"Delete"]);
                    },
                ]
            ],
        ],
    ]); ?>
</div>
