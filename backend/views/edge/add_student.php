<?php 
use yii\helpers\Html;

$this->title = "Add Student";
$this->params['breadcrumbs'][] = ["label"=>"Edge","url"=>'/admin/edge'];
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="edge-course-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <p>
        <?= Html::a('Go Back', ['volunteer',"id"=>Yii::$app->request->getQueryParam("id")], ['class' => 'btn btn-primary']) ?>
    </p>

    <?php 
    	echo $this->render('_addstudent_form',["model"=>$model]);
    ?>

</div>
