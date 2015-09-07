<?php
use yii\helpers\Html;

$this->title = "Edit donation form";
$this->params["breadcrumbs"][] = ["label" => "Manage donatio forms","url" => "/admin/donationform"];
$this->params["breadcrumbs"][] = $this->title;
?>
<h1><?php echo Html::encode($this->title);?></h1>
<div id="aaDonationForm"></div>

<?php
$this->registerJsFile('//code.jquery.com/ui/1.11.4/jquery-ui.js', ['depends' => [\yii\web\JqueryAsset::className()]]);
$this->registerCssFile("//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css");
$this->registerJs('Util._ajax("donation_forms/new","GET","json","",{"partner_id":{"label":"","type":"hidden"},"title":{"label":"Title","type":"text"},"partner_name":{"label":"Partner","type":"text","take_value":{"main_key":"partner","field":"organization_name"}},"description":{"label":"Description","type":"textarea"},"campaign":{"label":"Campaign Amount","type":"text"},"appendDivId":"aaDonationForm","fieldWrapper":"donation_form","formUrl":"donation_forms","formId":"addDonationForm","autocomplete":[{"divID":"aaDonationForm","inputID":"partner_name","value_divID":"partner_id","ajaxUrl":"partners/get_partner_by_name"}]},Util._addFunctionProcess)', yii\web\View::POS_END,'my_options');
?>