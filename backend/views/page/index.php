<?php 
    use yii\helpers\Html;
    
    $this->title = "Manage Pages";
    $this->params["breadcrumbs"][] = $this->title;
?>
<h1><?php echo Html::encode($this->title); ?></h1>
<p><a href="/admin/page/add" class="btn btn-primary">Add new page</a></p>
<form accept-charset="utf8" action="" method="GET" id="pageListingForm">
    <input type="hidden" name="page" id="page" value="1" />
    <input type="hidden" name="sort" id="sort" value="pages.title_doc" />
    <input type="hidden" name="sort_by" id="sort_by" value="asc" />
    <input type="hidden" name="table_host" id="table_host" value="pages" />
</form>
<div id="pageLisiting">
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
    $this->registerJs('Util._ajax("pages","GET","json",$("#pageListingForm").serialize(),"",Util._pageListing)', yii\web\View::POS_END,'my_options');
?>
