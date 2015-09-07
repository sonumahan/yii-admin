<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = ($model->isNewRecord) ? "Group Add : ".$courseModel->name : "Group Edit : ".$courseModel->name;

$this->params["breadcrumbs"][] = $this->title;
?>
<div class="">
    <h1><?= Html::encode($this->title); ?></h1>
    <p><?= Html::a("Go Back","/admin/edge/group/".$courseModel->course_id,["class" => "btn btn-primary"]);?></p>
    <?php $form = ActiveForm::begin(); ?>
        <?= $form->errorSummary($model); ?>
        <?= $form->field($model, "name")->textInput();?>
        <?= $form->field($model, "course_id")->hiddenInput()->label(""); ?>
        <div class="form-group">
            <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>
        </div>
    <?php ActiveForm::end();?>
</div>

