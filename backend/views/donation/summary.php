<?php

use yii\helpers\Html;

$this->title = "Donation financial summary";
$this->params["breadcrumbs"][] = ["label" => "Manage partner donations","url" => "/admin/donation"];
$this->params["breadcrumbs"][] = $this->title;
?>
<h1><?php echo Html::encode($this->title);?></h1>
<form accept-charset="utf8" action="" method="GET" id="summaryForm">
    <input type="hidden" name="page" id="page" value="1" />
    <input type="hidden" name="sort" id="sort" value="partners.organization_name" />
    <input type="hidden" name="sort_by" id="sort_by" value="asc" />
</form>
<div id="financialSummary">
    <div class="row">
        <div class="col-md-3" id="totalEarn">
            <div class="box box-success box-solid">
                <div class="box-header">
                    <h3 class="box-title">Total Earmarked Donations</h3>
                </div>
                <div class="box-body">
                    
                </div>
            </div>
        </div>
        <div class="col-md-3" id="totalPaypalFee">
            <div class="box box-success box-solid">
                <div class="box-header">
                    <h3 class="box-title">Total Paypal Fees</h3>
                </div>
                <div class="box-body">
                    
                </div>
            </div>
        </div>
        <div class="col-md-3" id="totalOmpFee">
            <div class="box box-success box-solid">
                <div class="box-header">
                    <h3 class="box-title">Total Omprakash Fees</h3>
                </div>
                <div class="box-body">
                    
                </div>
            </div>
        </div>
        <div class="col-md-3" id="pastRans">
            <div class="box box-success box-solid">
                <div class="box-header">
                    <h3 class="box-title">Total Past Transfers</h3>
                </div>
                <div class="box-body">
                    
                </div>
            </div>
        </div>
        <div class="col-md-3" id="allBalance">
            <div class="box box-success box-solid">
                <div class="box-header">
                    <h3 class="box-title">Total of all balances</h3>
                </div>
                <div class="box-body">
                    
                </div>
            </div>
        </div>
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
$this->registerJs('Util._ajax("donations/financial_summary","GET","json",$("#summaryForm").serialize(),"",Donation._summary)', yii\web\View::POS_END,'my_options');
?>
