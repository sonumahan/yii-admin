<?php 
use yii\helpers\Html;

$this->title = "Add new EdGE page slide";
$this->params["breadcrumbs"][] = ["label" => "Manage EdGE page slides","url" => "/admin/edgepageslide"];
$this->params["breadcrumbs"][] = $this->title;
?>
<h1><?php echo Html::encode($this->title); ?></h1>
<div id="addEdGEPageSlide">
	
</div>
<?php 
$this->registerJs('Util._ajax("edge_page_slides/new","GET","json","",{"content" : {"label" : "Description","type" : "textarea"},"author" : {"label" : "Author","type":"textarea"},"sequence" : {"label" : "Sequesnce","type":"text"},"appendDivId" : "addEdGEPageSlide","formUrl":"edge_page_slides","fieldWrapper":"edge_page_slide","formId":"editPageSlide"},Util._addFunctionProcess)',\yii\web\View::POS_END,'my_options');
?>
