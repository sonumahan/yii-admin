<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\EdgeCourse */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Edge Courses', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="edge-course-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->course_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->course_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'course_id',
            'name',
            'starting_date',
            'status',
            'detail',
            'week_num',
            'is_oriantation',
            'associated_cid',
            'sfcoID',
            'courseImage',
        ],
    ]) ?>

</div>
