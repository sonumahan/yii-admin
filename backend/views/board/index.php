<?php

use yii\helpers\Html;

$this->title = "Manage board members";
$this->params["breadcrumbs"][] = $this->title;
?>
<h1><?php echo Html::encode($this->title); ?></h1>
<p><a href="/admin/board/add" class="btn btn-primary">Add new board member</a></p>
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
$this->registerJs('Util._ajax("board","GET","json",$("#teamForm").serialize(),"",Board._handle)', yii\web\View::POS_END,'my_options');
?>
