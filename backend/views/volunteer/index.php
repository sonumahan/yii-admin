<?php
use yii\helpers\Html;

$this->title = "Volunteer Lisiting";
$this->params["breadcrumbs"][] = $this->title;
?>
<h1><?php echo Html::encode($this->title); ?></h1>
<p><a href="/admin/volunteer/add" class="btn btn-primary">Add Volunteer</a></p>
<form accept-charset="utf8" action="" method="GET" id="volunteerListingForm">
    <input type="hidden" name="page" id="page" value="1" />
    <input type="hidden" name="sort" id="sort" value="username" />
    <input type="hidden" name="sort_by" id="sort_by" value="asc" />
</form>
<div id="volunteerLisiting">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover">
                        
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?php 
$this->registerJs("Util._ajax('volunteer','GET','json',$('#volunteerListingForm').serialize(),'',Util._handleVolunteerAjaxResponse);", \yii\web\View::POS_END, 'my-options');
?>
