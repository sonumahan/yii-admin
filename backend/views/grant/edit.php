<?php
use yii\helpers\Html;

$this->title = "Edit volunteer grant recipients";
$this->params["breadcrumbs"][] = ["label" => "Grant recipients","url"=>'/admin/grant'];
$this->params["breadcrumbs"][] = $this->title;
?>
<h1><?php echo Html::encode($this->title); ?></h1>
<div id="editGrant">
    
</div>
<?php 
$this->registerJs('Util._ajax("grant_recipient/'.Yii::$app->request->getQueryParam("id").'/edit","GET","json",{},{"volunteer_id": {"label":"Volunteer ID","type":"hidden"},"title":{"label":"Title","type":"text"},"description":{"label":"Deacription","type":"textarea"},\'formUrl\' : \'grant_recipient/'.Yii::$app->request->getQueryParam("id").'\',\'appendDivId\' : \'editGrant\',\'fieldWrapper\': \'grant_recipient\',\'formId\':\'editGrantForm\'},Util._editFunctionProcess)', \yii\web\View::POS_END,'my_options');
?>
