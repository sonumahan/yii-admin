<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\EdgeCourseSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Edge Courses';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="edge-course-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Edge Course', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            'name',
            'starting_date',
            [
                "header" => "",
                'format' => 'raw',
                'content' => function($model) {
                    return Html::a(Html::encode('Manage Slides'),'/admin/edge/slide/'.$model->course_id);
                },
            ],
            [
                'header' => '',
                'format' => 'raw',
                'content' => function($model) {
                    return Html::a(Html::encode('Manage Students'),'/admin/edge/students/'.$model->course_id);
                },
            ],
            [
                'header' => '',
                'format' => 'raw',
                'content' => function($model) {
                    return Html::a(Html::encode('Manage Response Question'),'/admin/edge/question/'.$model->course_id);
                },
            ],
            [
                'header' => '',
                'format' => 'raw',
                'content' => function($model) {
                    return Html::a(Html::encode('Manage Group'),'/admin/edge/group/'.$model->course_id);
                },
            ],
            [
                'header' => '',
                'format' => 'raw',
                'content' => function($model) {
                    return Html::a(Html::encode('Manage Observation'),'/admin/edge/observation/'.$model->course_id);
                },
            ],
            [
                'header' => '',
                'format' => 'raw',
                'content' => function($model) {
                    return Html::a(Html::encode('Manage Response/Feedback'),'/admin/edge/response/'.$model->course_id);
                },
            ],
            [
                'header' => '',
                'format' => 'raw',
                'content' => function($model) {
                    return Html::a(Html::encode('Add/Remove Volunteer'),'/admin/edge/volunteer/'.$model->course_id);
                },
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
