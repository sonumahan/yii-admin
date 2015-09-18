<?php

use yii\helpers\Html;
$this->title = "Add new team member";
$this->params["breadcrumbs"][] = ["label" => "Manage team members","url" => "/admin/team"];
$this->params["breadcrumbs"][] = $this->title;
?>
<h1><?php echo Html::encode($this->title); ?></h1>
<div id="addTeam">
    
</div>
<?php 
$this->registerJs('Util._ajax("team/new","GET","json","",{"name":{"label":"Name","type":"text"},"email":{"label":"Email","type":"text"},"role":{"label":"Role","type":"text"},"skype":{"label":"Skype","type":"text"},"phone":{"label":"Phone","type":"text"},"description":{"label":"Description","type":"textarea"},"color_image":{"label":"Color Image","type":"file"},"gray_image":{"label":"Gray Image","type":"file"},"formUrl":"team","appendDivId":"addTeam","formId":"editTeamFrom","fieldWrapper":"team","fileUpload":"yes"},Util._addFunctionProcess)', yii\web\View::POS_END,'my_options');
?>
