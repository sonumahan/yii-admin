<?php 

use yii\helpers\Html;

$this->title = "Add new home page slide";
$this->params["breadcrumbs"][] = ["label" => "Manage home page slides","url" => "/admin/homepageslide"];
$this->params["breadcrumbs"][] = $this->title;
?>
<h1><?php echo Html::encode($this->title); ?></h1>
<div id="addHomeSlide"></div>

<?php 
$this->registerJs('Util._ajax("home_page_slides","GET","json","",{"title":{"label":"Title","type":"text"},"filename":{"label":"Slide Image","type":"file"},"slide_ulr":{"label":"Slide Url","type":"text"},"content":{"label":"Slide Description","type":"textarea"},"sequence":{"label":"Sequence","type":"text"},"appendDivId":"addHomeSlide","fileUpload":"yes","formUrl":"home_page_slides","fieldWrapper":"home_page_slide","formId":"addSlideForm"},Util._addFunctionProcess)',\yii\web\View::POS_END,'my_options');
?>
