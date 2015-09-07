<?php

use yii\helpers\Html;

$this->title = 'Add New Volunteer';
$this->params['breadcrumbs'][] = ['url'=>'/admin/volunteer','label'=>'Volunteers'];
$this->params['breadcrumbs'][] = $this->title;
?>
<h1><?php echo Html::encode($this->title); ?></h1>
<div id="addVolunteer">
    
</div>
<?php 
$this->registerJs('Util._ajax(\'volunteer/new\',\'GET\',\'json\',{},{"first_name":{"label":"First Name","type":"text"},"last_name":{"label":"Last Name","type":"text"},"phone_number":{"label":"Phone Number","type":"text"},"email":{"label":"Email","type":"text"},"address":{"label":"Address","type":"text"},"state":{"label":"State","type":"select"},"zip":{"label":"Zip","type":"text"},"university":{"label":"University","type":"text"},"country":{"label":"Country","type":"select"},"regions_of_interest": {"label":"Regions of interest","type":"multiple"},"about":{"label":"About","type":"textarea"},"skills":{"label":"Skills","type":"multiple"},"username":{"label":"Username","type":"text"},"password":{"label":"Password","type":"password"},"password_confirmation":{"label":"Confirm Password","type":"password"},\'formUrl\' : \'volunteer\',\'appendDivId\' : \'addVolunteer\',\'fieldWrapper\': \'volunteer\',\'formId\':\'addVolunteerForm\'},Util._addFunctionProcess)');
?>

