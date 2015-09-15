<?php
    use yii\helpers\Html;
    
    $this->title = "Manage partner donations";
    $this->params["breadcrumbs"][] = $this->title;
?>
<h1><?php echo Html::encode($this->title); ?></h1>
<form accept-charset="utf8" action="" method="GET" id="donationListingForm">
    <input type="hidden" name="page" id="page" value="1" />
    <input type="hidden" name="sort" id="sort" value="partner_donations.date_added" />
    <input type="hidden" name="sort_by" id="sort_by" value="desc" />
</form>
<div id="donationListing">
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
$this->registerJs('Util._ajax("donations","GET","json",$("#donationListingForm").serialize(),"",Donation._handle)', yii\web\View::POS_END,'my_options');
?>

