<?php
/* @var $this yii\web\View */
use yii\helpers\Html;

$this->title = "Partner Lsting";
$this->params['breadcrumbs'][] = $this->title;
?>
<h1><?= Html::encode($this->title) ?></h1>
<p><a href="/admin/partner/add" class="btn btn-primary">Add New Partner</a></p>
<form accept-charset="utf8" action="" method="GET" id="partnerListingForm">
    <input type="hidden" name="page" id="page" value="1" />
    <input type="hidden" name="sort" id="sort" value="username" />
    <input type="hidden" name="sort_by" id="sort_by" value="asc" />
</form>
<div id="partnerListing">
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
$this->registerJs("Util._ajax('plist','GET','json',$('#partnerListingForm').serialize(),'',Util._handleAjaxResponse);", \yii\web\View::POS_END, 'my-options');
?>
