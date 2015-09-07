<?php
use yii\helpers\Html;

$this->title = "Add new partner rating";
$this->params["breadcrumbs"][] = ["label"=>"Manage partner ratings","url"=>'/admin/rating'];
$this->params["breadcrumbs"][] = $this->title;
?>
<h1><?php echo Html::encode($this->title); ?></h1>
<div id="addRating">

</div>
<?php 
$this->registerJsFile('//code.jquery.com/ui/1.11.4/jquery-ui.js', ['depends' => [\yii\web\JqueryAsset::className()]]);
$this->registerCssFile("//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css");
$this->registerJs('Util._ajax("ratings/new","GET","json","",{"volunteer_id":{"label":"","type": "hidden"},"partner_id":{"label":"","type":"hidden"},"autocomplete":[{"divID":"addRating","inputID":"volunteer_name","value_divID":"volunteer_id","ajaxUrl":"volunteer/get_volunteer_by_first_or_last_name"},{"divID":"addRating","inputID":"partner_name","value_divID":"partner_id","ajaxUrl":"partners/get_partner_by_name"}],"volunteer_name": {"label":"Volunteer","type":"text","take_value":{"main_key":"volunteer","field":"first_name|last_name"}},"partner_name":{"label":"Partner","type":"text","take_value":{"main_key":"partner","field":"organization_name"}},"title":{"label":"Title","type":"text"},"message":{"label":"Message","type":"textarea"},"rating_1":{"label":"Overall experience","type":"select","value_from":{"1":"1","2":"2","3":"3","4":"4","5":"5"}},"rating_1_description":{"label":"Overall experience description","type":"textarea"},"rating_2":{"label":"Do you feel you made a difference?","type":"select","value_from":{"1":"1","2":"2","3":"3","4":"4","5":"5"}},"rating_2_description":{"label":"Do you feel you made a difference description","type":"textarea"},"rating_3":{"label":"Organization and communication","type":"select","value_from":{"1":"1","2":"2","3":"3","4":"4","5":"5"}},"rating_3_description":{"label":"Organization and communication review description","type":"textarea"},"rating_4":{"label":"Accommodations","type":"select","value_from":{"1":"1","2":"2","3":"3","4":"4","5":"5"}},"rating_4_description":{"label":"Accommodations review description","type":"textarea"},"rating_5":{"label":"Safety","type":"select","value_from":{"1":"1","2":"2","3":"3","4":"4","5":"5"}},"rating_5_description":{"label":"Safety review description","type":"textarea"},"formUrl":"ratings","appendDivId":"addRating","fieldWrapper":"ratings","formId":"addRatingForm"},Util._addFunctionProcess)', yii\web\View::POS_END,'my_options');
?>
