<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\ckeditor\CKEditor;
use yii\helpers\ArrayHelper;
use common\models\EdgeCourse;
/* @var $this yii\web\View */
/* @var $model common\models\EdgeCourse */
/* @var $form yii\widgets\ActiveForm */
$cID = (Yii::$app->request->getQueryParam("id") !== null) ? Yii::$app->request->getQueryParam("id") : 0;
?>

<div class="edge-course-form">

    <?php $form = ActiveForm::begin(['options'=>['enctype'=>'multipart/form-data']]); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
    
    <?= $form->field($model, 'detail')->widget(CKEditor::className(), [
        'options' => ['rows' => 6],
        'preset' => 'full'
    ]) ?>
    <?= $form->field($model, 'starting_date')->widget(\yii\jui\DatePicker::classname(), [
        //'language' => 'ru',
        'dateFormat' => 'yyyy-MM-dd',
        'options' => ['class'=>'form-control']
       
    ]) ?>

    <?= $form->field($model, 'status')->dropDownList(["active"=>"active","inactive"=>"inactive"]) ?>

    


    <?= $form->field($model, 'week_num')->textInput() ?>

    <?= $form->field($model, 'is_oriantation')->dropDownList([ '0'=>"No", '1'=>"Yes"], ['prompt' => '-- Is orientation program --']) ?>

    <?= $form->field($model, 'associated_cid')->dropDownList(ArrayHelper::map(EdgeCourse::find()->where("status = 'active' AND course_id != :course_id AND is_oriantation = '0'",[":course_id" => $cID])->all(), "course_id", "name"),["prompt"=>"--Select Course --"]) ?>

    <?= $form->field($model, 'courseImage')->fileInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
