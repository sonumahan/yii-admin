<?php

use yii\helpers\Html;

$this->title = "Manage partner applications";
$this->params["breadcrumbs"][] = ["label" => "Manage partners","url" => "/admin/partner"];
$this->params["breadcrumbs"][] = $this->title;
?>
<h1><?php echo Html::encode($this->title); ?></h1>
<form accept-charset="utf8" action="" method="GET" id="volunteerApplicationForm">
    <input type="hidden" name="page" id="page" value="1" />
    <input type="hidden" name="sort" id="sort" value="datecreated" />
    <input type="hidden" name="sort_by" id="sort_by" value="desc" />
</form>
<div id="volunteerApplicationLisiting">
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
$this->registerJs('Util._ajax("partners/'.Yii::$app->request->getQueryParam("id").'/applications","GET","json",$("#volunteerApplicationForm").serialize(),"",Partner._application)', yii\web\View::POS_END,'my_options');
?>

