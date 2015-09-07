<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\EdgeCourse */

$this->title = 'Create Edge Course';
$this->params['breadcrumbs'][] = ['label' => 'Edge Courses', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="edge-course-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
