<?php

use yii\helpers\Html;
$this->title = "Manage partners expense receipts";

$this->params["breadcrumbs"][] = $this->title;
?>
<h1><?php echo Html::encode($this->title); ?></h1>
<p><a href="/admin/receipt/add" class="btn btn-primary">Add new partner expense receipt</a></p>
<form accept-charset="utf8" action="" method="GET" id="receiptForm">
    <input type="hidden" name="page" id="page" value="1" />
    <input type="hidden" name="sort" id="sort" value="partner_receipts.date_added" />
    <input type="hidden" name="sort_by" id="sort_by" value="desc" />
</form>
<div id="expenseReceipt">
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
$this->registerJs('Util._ajax("receipts","GET","json",$("#receiptForm").serialize(),"",Receipts._handle)', yii\web\View::POS_END,'my_options');
?>

