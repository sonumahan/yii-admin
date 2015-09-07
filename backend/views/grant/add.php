<?php
use yii\helpers\Html;
use yii\jui\AutoComplete;

$this->title = "Add volunteer grant recipients";
$this->params["breadcrumbs"][] = ['label'=>'Grant Recipients','url'=>'/admin/grant'];
$this->params["breadcrumbs"][] = $this->title;
?>
<h1><?php echo Html::encode($this->title);?></h1>
<div id="addGrant">
    
</div>

<?php
$this->registerJsFile('//code.jquery.com/ui/1.11.4/jquery-ui.js', ['depends' => [\yii\web\JqueryAsset::className()]]);
$this->registerCssFile("//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css");
$this->registerJs('Util._ajax("grant_recipient/new","GET","json",{},{"volunteer_name":{"label":"Volunteer","type":"text"},"title":{"label":"Title","type":"text"},"description":{"label":"Description","type":"textarea"},"formUrl":"grant_recipient","appendDivId":"addGrant","fieldWrapper":"grant_recipient","formId":"addFrantForm","autocomplete":[{"divID":"addGrant","inputID":"volunteer_name","value_divID":"volunteer_id","ajaxUrl":"volunteer/get_volunteer_by_first_or_last_name"}],"volunteer_id":{"label":"","type":"hidden"}},Util._addFunctionProcess)', \yii\web\View::POS_END,'my_option');
?>

