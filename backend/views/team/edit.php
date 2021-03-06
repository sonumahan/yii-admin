<?php

use yii\helpers\Html;

$this->title = "Edit team member";
$this->params["breadcrumbs"][] = ["label" => "Manage team members","url" => "/admin/team"];
$this->params["breadcrumbs"][] = $this->title;
?>
<h1><?php echo Html::encode($this->title); ?></h1>
<div id="editTeam">
    
</div>
<?php 
$this->registerJs('Util._ajax("team/'.Yii::$app->request->getQueryParam("id").'/edit","GET","json","",{"name":{"label":"Name","type":"text"},"email":{"label":"Email","type":"text"},"role":{"label":"Role","type":"text"},"skype":{"label":"Skype","type":"text"},"phone":{"label":"Phone","type":"text"},"description":{"label":"Description","type":"textarea"},"color_image":{"label":"Color Image","type":"file"},"gray_image":{"label":"Gray Image","type":"file"},"formUrl":"team/'.Yii::$app->request->getQueryParam("id").'","appendDivId":"editTeam","formId":"editTeamFrom","fieldWrapper":"team","fileUpload":"yes"},Util._editFunctionProcess)', yii\web\View::POS_END,'my_options');
?>