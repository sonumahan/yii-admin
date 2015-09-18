<?php

use yii\helpers\Html;

$this->title = "Edit partner story";
$this->params["breadcrumbs"][] = ["label" => "Manage partner stories","url" => "/admin/story"];
$this->params["breadcrumbs"][] = $this->title;
?>
<h1><?php echo Html::encode($this->title); ?></h1>
<div id="editStory">
</div>

<?php 
$this->registerJsFile('//code.jquery.com/ui/1.11.4/jquery-ui.js', ['depends' => [\yii\web\JqueryAsset::className()]]);
$this->registerCssFile("//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css");
$this->registerJs('Util._ajax("stories/'.Yii::$app->request->getQueryParam("id").'/partner_story_edit","GET","json","",{"title":{"label":"Title","type":"text"},"organization_name":{"label":"Partner","type":"text"},"content":{"label":"Description","type":"textarea"},"partner_id":{"label":"","type":"hidden"},"autocomplete":[{"divID":"editStory","inputID":"organization_name","value_divID":"partner_id","ajaxUrl":"partners/get_partner_by_name"}],"appendDivId":"editStory","formUrl": "stories/'.Yii::$app->request->getQueryParam("id").'/partner_story_update","fieldWrapper":"story","formId":"editStoryForm"},Util._editFunctionProcess)', yii\web\View::POS_END,'my_options');
?>

