<?php

use yii\helpers\Html;
$this->title = "Add new board member";
$this->params["breadcrumbs"][] = ["label" => "Manage board members","url" => "/admin/team"];
$this->params["breadcrumbs"][] = $this->title;
?>
<h1><?php echo Html::encode($this->title); ?></h1>
<div id="addTeam">
    
</div>
<?php 
$this->registerJs('Util._ajax("board/new","GET","json","",{"name":{"label":"Name","type":"text"},"email":{"label":"Email","type":"text"},"role":{"label":"Role","type":"text"},"skype":{"label":"Skype","type":"text"},"phone":{"label":"Phone","type":"text"},"description":{"label":"Description","type":"textarea"},"color_image":{"label":"Color Image","type":"file"},"gray_image":{"label":"Gray Image","type":"file"},"formUrl":"board","appendDivId":"addTeam","formId":"editTeamFrom","fieldWrapper":"board","fileUpload":"yes"},Util._addFunctionProcess)', yii\web\View::POS_END,'my_options');
?>
