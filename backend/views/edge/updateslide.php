<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\ckeditor\CKEditor;

$this->title = ($model->isNewRecord) ? "Add Slide : ".$courseModel->name : "Edit Slide : ".$model->title;
$this->params["breadcrumbs"][] = ["label" => "Slide","url"=>"/admin/edge/slide/".Yii::$app->request->getQueryParam("cID")];
$this->params["breadcrumbs"][] = $this->title;

?>
<div class="edge-course-index">
    <h1><?php echo Html::encode($this->title); ?></h1>
    <p><?php echo Html::a("Go Back",["/edge/slide/".$model->course_id],["class"=>"btn btn-primary"]); ?></p>
    <?php $form = ActiveForm::begin(); ?>
        <?= $form->errorSummary($model); ?>
        <?php echo $form->field($model, "title")->textInput(); ?>
        <?= $form->field($model, 'detail')->widget(CKEditor::className(), [
            'options' => ['rows' => 6],
            'preset' => 'full'
        ]) ?>
        <?= $form->field($model, "status")->dropDownList(["active"=>"Active","inactive"=>"Inactive"], ["prompt"=>"-- Select Status --"]); ?>
        <?= $form->field($model, "course_id")->hiddenInput()->label(""); ?>
        <?= $form->field($model, "week")->dropDownList(Yii::$app->util->getWeekRange($courseModel->week_num), ["prompt"=>"-- Select Week --"]); ?>
        <div class="form-group">
            <?= Html::submitButton($model->isNewRecord ? 'Create Slide' : 'Update Slide', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>
    <?php    ActiveForm::end(); ?>
</div>

