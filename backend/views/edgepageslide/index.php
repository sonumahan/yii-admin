<?php 
use yii\helpers\Html;

$this->title = "Manage edge page slides";
$this->params["breadcrumbs"][] = $this->title;
?>
<h1><?php echo Html::encode($this->title); ?></h1>
<p><a href="/admin/edgepageslide/add" class="btn btn-primary">Add slide</a></p>
<form accept-charset="utf8" action="" method="GET" id="edgeSlideListingForm">
    <input type="hidden" name="page" id="page" value="1" />
    <input type="hidden" name="sort" id="sort" value="sequence" />
    <input type="hidden" name="sort_by" id="sort_by" value="asc" />
</form>
<div id="edgeSlideLisiting">
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
$this->registerJs('Util._ajax("edge_page_slides","GET","json",$("#edgeSlideListingForm").serialize(),"",EdgePageSlide._handle)',\yii\web\View::POS_END,'my_options'); 
?>