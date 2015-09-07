<?php

use yii\helpers\Html;

$this->title = "Manage home page slides";
$this->params["breadcrumbs"][] = $this->title;
?>
<h1><?php echo Html::encode($this->title); ?></h1>
<p><a href="/admin/homepageslide/add" class="btn btn-primary">Add new slide</a></p>
<form accept-charset="utf8" action="" method="GET" id="homeSlideFom">
    <input type="hidden" name="page" id="page" value="1" />
    <input type="hidden" name="sort" id="sort" value="title" />
    <input type="hidden" name="sort_by" id="sort_by" value="asc" />
</form>
<div id="homeSlide">
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
$this->registerJs('Util._ajax("home_page_slides","GET","json",$("#homeSlideFom").serialize(),"",HomePageSlide._handle)',\yii\web\View::POS_END,'my_options');
?>
