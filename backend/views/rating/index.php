<?php 
use yii\helpers\Html;

$this->title = "Manage partner ratings";
$this->params["breadcrumbs"][] = $this->title;
?>
<h1><?php echo Html::encode($this->title); ?></h1>
<p><a href="/admin/rating/add" class="btn btn-primary">Add new partner rating</a></p>
<form accept-charset="utf8" action="" method="GET" id="partnerRatingListingForm">
    <input type="hidden" name="page" id="page" value="1" />
    <input type="hidden" name="sort" id="sort" value="title" />
    <input type="hidden" name="sort_by" id="sort_by" value="asc" />
</form>
<div id="partnerRatingListing">
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
$this->registerJs('Util._ajax(\'ratings\',\'GET\',\'json\',$("#partnerRatingListingForm").serialize(),"",Util._ajaxRatingHandle)', yii\web\View::POS_END,'my_options');
?>

