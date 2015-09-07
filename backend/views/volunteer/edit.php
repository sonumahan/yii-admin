<?php

use yii\helpers\Html;

$this->title = "Edit Volunteer";
$this->params["breadcrumbs"][] = ["label"=>"Volunteers","url"=>"/admin/volunteer"];
$this->params["breadcrumbs"][] = $this->title;
?>
<h1><?php echo Html::encode($this->title);?></h1>
<div id="editVolunteer">
    
</div>
<?php 
$this->registerJs('Util._ajax("volunteer/'.Yii::$app->request->getQueryParam('id').'/edit","GET","json",{},{"first_name":{"label":"First Name","type":"text"},"last_name":{"label":"Last Name","type":"text"},"phone_number":{"label":"Phone Number","type":"text"},"email":{"label":"Email","type":"text"},"address":{"label":"Address","type":"text"},"state":{"label":"State","type":"select"},"zip":{"label":"Zip","type":"text"},"university":{"label":"University","type":"text"},"country":{"label":"Country","type":"select"},"regions_of_interest": {"label":"Regions of interest","type":"multiple"},"about":{"label":"About","type":"textarea"},"skills":{"label":"Skills","type":"multiple"},"username":{"label":"Username","type":"text"},\'formUrl\' : \'volunteer/'.Yii::$app->request->getQueryParam('id').'\',\'appendDivId\' : \'editVolunteer\',\'fieldWrapper\': \'volunteer\',\'formId\':\'editVolunteerForm\'},Util._editFunctionProcess);', \yii\web\View::POS_END,"my_options");
?>

