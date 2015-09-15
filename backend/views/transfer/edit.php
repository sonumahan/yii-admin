<?php
use yii\helpers\Html;

$this->title = "Edit partner transfer";
$this->params["breadcrumbs"][] = ["label" => "Manage partner transfers","url" => "/admin/transfer"];
$this->params["breadcrumbs"][] = $this->title;
?>
<h1><?php echo Html::encode($this->title); ?></h1>
<div id="editTransfer">
    
</div>
<?php 
$this->registerJsFile('//code.jquery.com/ui/1.11.4/jquery-ui.js', ['depends' => [\yii\web\JqueryAsset::className()]]);
$this->registerCssFile("//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css");
$this->registerJs('Util._ajax("transfers/'.Yii::$app->request->getQueryParam("id").'/edit","GET","json","",{"partner_name":{"label":"Partner","type":"text","take_value":{"main_key":"partner","field":"organization_name"}},"debit":{"label":"Transfer Amount","type":"text"},"notes":{"label":"Notes","type":"textarea"},"partner_id":{"label":"","type":"hidden"},"autocomplete":[{"divID":"editTransfer","inputID":"partner_name","value_divID":"partner_id","ajaxUrl":"partners/get_partner_by_name"}],"appendDivId":"editTransfer","fieldWrapper":"payments_made","formId":"editTransferForm","formUrl":"transfers/'.Yii::$app->request->getQueryParam("id").'"},Util._editFunctionProcess)', yii\web\View::POS_END,'my_options');
?>
