<?php

use yii\helpers\Html;

$this->title = "Manage team members";
$this->params["breadcrumbs"][] = $this->title;
?>
<h1><?php echo Html::encode($this->title); ?></h1>
<p><a href="/admin/team/add" class="btn btn-primary">Add new team member</a></p>
<form accept-charset="utf8" action="" method="GET" id="teamForm">
<form accept-charset="utf8" action="" method="GET" id="teamForm">
    <input type="hidden" name="page" id="page" value="1" />
    <input type="hidden" name="sort" id="sort" value="s_order" />
    <input type="hidden" name="sort_by" id="sort_by" value="asc" />
</form>
<div id="team">
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
$this->registerJs('Util._ajax("team","GET","json",$("#teamForm").serialize(),"",Team._handle)', yii\web\View::POS_END,'my_options');
?>
