<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\EdgeCourseSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="edge-course-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'course_id') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'starting_date') ?>

    <?= $form->field($model, 'status') ?>

    <?= $form->field($model, 'detail') ?>

    <?php // echo $form->field($model, 'week_num') ?>

    <?php // echo $form->field($model, 'is_oriantation') ?>

    <?php // echo $form->field($model, 'associated_cid') ?>

    <?php // echo $form->field($model, 'sfcoID') ?>

    <?php // echo $form->field($model, 'courseImage') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
