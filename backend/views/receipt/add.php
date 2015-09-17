<?php

use yii\helpers\Html;
$this->title = "Add partner expense receipt";

$this->params["breadcrumbs"][] = ["label" => "Manage partners expense receipts","url" => '/admin/receipt'];
$this->params["breadcrumbs"][] = $this->title;
?>

<h1><?php echo Html::encode($this->title); ?></h1>

<div id="addReceipt"></div>

<?php
$this->registerJsFile('//code.jquery.com/ui/1.11.4/jquery-ui.js', ['depends' => [\yii\web\JqueryAsset::className()]]);
$this->registerCssFile("//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css");
$this->registerJs('Util._ajax("receipts/new","GET","json","",{"partner_name":{"label":"Partner","type":"text","take_value":{"main_key":"partner","field":"organization_name"}},"partner_id":{"label":"","type":"hidden"},"autocomplete":[{"divID":"addReceipt","inputID":"partner_name","value_divID":"partner_id","ajaxUrl":"partners/get_partner_by_name"}],"category":{"label":"Expense Category","type":"select","value_from":{"Administrative":"Administrative (eg: electricity bills, rent)","Construction":"Construction","Teachers":"Teacher salaries","Staff":"Staff salaries","Medical":"Medical supplies","Educational":"Educational supplies (eg: books)","Computers":"Computers","Scholarships":"Scholarships","Technology Assistanc":"Technology Assistance","Other":"Other"}},"title":{"label":"How has this money been allocated?","type":"text"},"amount":{"label":"Expense Amount (00.00 in USD)","type":"text"},"description":{"label":"Additional Details","type":"textarea"},"appendDivId":"addReceipt","formUrl": "receipts","fieldWrapper":"partner_receipt","formId":"addReceiptForm"},Util._addFunctionProcess)', yii\web\View::POS_END,'my_options');
?>


