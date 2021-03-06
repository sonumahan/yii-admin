<?php 
use yii\helpers\Html;

$this->title = "Manage landing pages";
$this->params["breadcrumbs"][] = $this->title;
?>
<h1><?php echo Html::encode($this->title); ?></h1>
<p><a href="/admin/landingpage/add" class="btn btn-primary">Add New</a></p>
<form accept-charset="utf8" action="" method="GET" id="landingPageListingForm">
    <input type="hidden" name="page" id="page" value="1" />
    <input type="hidden" name="sort" id="sort" value="volunteer_opportunities_landing_pages.title_doc" />
    <input type="hidden" name="sort_by" id="sort_by" value="asc" />
</form>
<div id="landingPageLisiting">
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
$this->registerJs('Util._ajax("landing_pages","GET","json",$("#landingPageListingForm").serialize(),"",LandingPage._handle)', yii\web\View::POS_END,'my_options');
?>
