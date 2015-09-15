<?php 
use yii\helpers\Html;

$this->title = "Manage partner transfers";
$this->params["breadcrumbs"][] = $this->title;
?>
<h1><?php echo Html::encode($this->title); ?></h1>
<p><a href="/admin/transfer/add" class="btn btn-primary">Add new transfer</a></p>
<form accept-charset="utf8" action="" method="GET" id="transferListingForm">
    <input type="hidden" name="page" id="page" value="1" />
    <input type="hidden" name="sort" id="sort" value="payments_made.created_at" />
    <input type="hidden" name="sort_by" id="sort_by" value="desc" />
</form>
<div id="transferListing">
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
$this->registerJs('Util._ajax("transfers","GET","json",$("#transferListingForm").serialize(),"",Transfer._handle)', yii\web\View::POS_END,'my_options');
?>
