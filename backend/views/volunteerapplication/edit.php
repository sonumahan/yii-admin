<?php
    use yii\helpers\Html;
    
    $this->title = "Edit volunteer application";
    $this->params["breadcrumbs"][] = ["label"=>"Manage volunteer application","url"=>"/admin/volunteerapplication"];
    $this->params["breadcrumbs"][] = $this->title;
?>
<h1><?php echo Html::encode($this->title); ?></h1>
<div id="editVolunteerApplication">
    
</div>
<?php
    $this->registerJs('Util._ajax("volunteer_application/'.Yii::$app->request->getParam("id").'/edit","GET","json","",{},Util._editProcessFunction)', yii\web\View::POS_END,'my_option')
?>