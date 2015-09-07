<?php
use yii\helpers\Html;

$this->title = "Edit Partner";
$this->params["breadcrumbs"][] = ["label" => "Partners","url"=>"/admin/partner"];
$this->params["breadcrumbs"][] = $this->title;
?>
<h1><?php echo Html::encode($this->title); ?></h1>
<input type="hidden" name="pID" id="pID" value="<?php echo Yii::$app->request->getQueryParam("id"); ?>" />
<div id="editPartner">
    
</div>
<?php 
$this->registerJs("Util._ajax('partners/".Yii::$app->request->getQueryParam("id")."/edit','GET','json',{},{'profile_image':{'label':'Profile Image','type':'file'},'organization_name':{'label':'Organization\'s Name','type':'text'},'active_status':{'label':'Status','type':'select'},'organization_website':{'label':'Organization\'s Website','type':'text'},'director_first_name':{'label':'Director\'s  First Name','type':'text'},'director_last_name':{'label':'Director\'s Last Name','type':'text'},'phone_number':{'label':'Phone Number','type':'text'},'director_email':{'label':'Director\'s Email','type':'text'},'secondary_email':{'label':'Secondary Email','type':'text'},'tertiary_email':{'label':'Tertiary Email','type':'text'},'address':{'label':'Address','type':'text'},'city':{'label':'City','type':'text'},'state':{'label':'State','type':'select'},'zip':{'label':'Zip','type':'text'},'country':{'label':'Country','type':'select'},'region':{'label':'Region','type':'select'},'bank_info':{'label':'Bank Info','type':'textarea'},'about':{'label':'Mission','type':'textarea'},'current_projects':{'label':'Current Projects','type':'textarea'},'average_cost_per_day':{'label':'Daily Cost','type':'text'},'cost_for_volunteers':{'label':'Cost for Volunteers:','type':'textarea'},'logistics':{'label':'Logistics<br/>Please describe relevant logistics for volunteers, such as number of volunteers you need, ideal length of volunteer residence, etc','type':'textarea'},'accomodation_info':{'label':'Accomodation Information','type':'textarea'},'lat':{'label':'Lattitude','type':'text'},'lng':{'label':'Longitude','type':'text'},'stub':{'label':'Partner Stub','type':'text'},'username':{'label':'Username','type':'text'},'last_login':{'label':'Last Login','type':'text'},'formUrl' : 'partners/".Yii::$app->request->getQueryParam("id")."','appendDivId' : 'editPartner','fieldWrapper': 'partner','formId':'editPartnerForm','fileUpload':'yes'},Util._editFunctionProcess);", \yii\web\View::POS_END, 'my-options');
?>

