<?php

use yii\helpers\Html;

$this->title = "View partner information";
$this->params["breadcrumbs"][] = ["label" => "Manage partners","url" => "/admin/partner"];
$this->params["breadcrumbs"][] = $this->title;
?>

<h1><?php echo Html::encode($this->title); ?></h1>
<div id="partnerInfo">
    
</div>
<?php 
$this->registerJs('Util._ajax("partners/'.Yii::$app->request->getQueryParam("id").'/summary","GET","json","","",SummaryView._handlePartner)', yii\web\View::POS_END,'my_options');
?>

