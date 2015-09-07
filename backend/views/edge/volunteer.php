<?php

use yii\helpers\Html;
use yii\grid\GridView;
/* @var $this yii\web\View */
/* @var $searchModel common\models\EdgeCourseSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
$this->title = $modelData->name .' : Student Enrollment';
$this->params['breadcrumbs'][] = ["label"=>"Edge","url"=>'/admin/edge'];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="edge-course-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <p>
        <?= Html::a('Add Student', ['addstudent',"id"=>Yii::$app->request->getQueryParam("id")], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $model,
        'columns' => [
            'first_name',
            'last_name',
            [
                'class' => 'yii\grid\ActionColumn',
                "template" => "{delete}",
                "buttons" => [
                    "delete" => function($url,$model) {
                        $url = "/admin/edge/studentdelete/".Yii::$app->request->getQueryParam("id")."?sID=".$model["id"];
                        return Html::a("<span class='glyphicon glyphicon-trash'></span>", $url,["data-pjax" => "0","data-method" => "post","data-confirm" => "Are you sure you want to delete this item?","aria-label" => "Delete","title" => "Delete"]);
                    }
                ],
            ],
        ],
    ]); ?>

</div>
