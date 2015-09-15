<?php

use yii\helpers\Html;
$this->title = "Add new partner donation";
$this->params["breadcrumbs"][] = ["label" => "Manage partner donations","url" => "/admin/donation"];
$this->params["breadcrumbs"][] = $this->title;
?>
<h1><?php echo Html::encode($this->title); ?></h1>
<div id="addDonation">
    
</div>

<?php 
$this->registerJsFile('//code.jquery.com/ui/1.11.4/jquery-ui.js', ['depends' => [\yii\web\JqueryAsset::className()]]);
$this->registerCssFile("//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css");
$this->registerJs('Util._ajax("donations/new","GET","json","",{"partner_name":{"label":"Partner","type":"text","take_value":{"main_key":"partner","field":"organization_name"}},"autocomplete":[{"divID":"addDonation","inputID":"partner_name","value_divID":"partner_id","ajaxUrl":"partners/get_partner_by_name"}],"partner_id":{"label":"","type":"hidden"},"first_name":{"label":"First Name","type":"text"},"last_name":{"label":"Last Name","type":"text"},"email":{"label":"Email","type":"text"},"amount":{"label":"Amount","type":"text"},"type":{"label":"Type","type":"select","value_from":{"not electronic":"Not Electronic","electronic" : "Electronic"}},"address":{"label":"Address Line 1","type":"text"},"address2":{"label":"Address Line 2","type":"text"},"city":{"label":"City","type":"text"},"state":{"label":"State","type":"select"},"zip":{"label":"Zip","type":"text"},"country":{"label":"Country","type":"select"},"notes":{"label":"Notes","type":"textarea"},"status":{"label":"","type":"hidden","value_from":"Y"},"appendDivId":"addDonation","fieldWrapper":"donation","formUrl":"donations"},Util._addFunctionProcess)', yii\web\View::POS_END,'my_options');
?>
