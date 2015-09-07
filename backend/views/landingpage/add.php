<?php
use yii\helpers\Html;

$this->title = "Add new landing page";
$this->params["breadcrumbs"][] = ["label"=>"Manage landind pages","url"=>"/admin/landingpage"];
$this->params["breadcrumbs"][] = $this->title;
?>
<h1><?php echo Html::encode($this->title);?></h1>
<div id="addLandingPage"></div>

<?php
$this->registerJs('Util._ajax("landing_pages/new","GET","json","",{"version":{"label":"Page Status","type":"select","value_from":{"draft":"Draft","published":"published"},"associated":"page_detail"},"table_host":{"label":"","type":"hidden","value_from":"volunteer_opportunities_landing_pages"},"title_doc":{"label":"Document Title","type":"text","associated":"page_detail"},"title_heading":{"label":"Headline","type":"text","associated":"page_detail"},"title_link":{"label":"URL ID","type":"text"},"h1_optimized":{"label":"H1 optimized","type":"text","associated":"page_detail"},"h2_optimized":{"label":"H2 optimized","type":"text","associated":"page_detail"},"h3_optimized":{"label":"H3 optimized","type":"textarea","associated":"page_detail"},"sidebar_text":{"label":"Right Sidebar Text","type":"text","associated":"page_detail"},"quote":{"label":"Quote","type":"text","associated":"page_detail"},"content":{"label":"Content","type":"textarea","associated":"page_detail"},"seo_keywords":{"label":"SEO Keywords","type":"text","associated":"page_detail"},"seo_description":{"label":"SEO Description","type":"text","associated":"page_detail"},"region_id":{"label":"Region","type":"select","associated":"page_detail"},"country":{"label":"Country","type":"text","associated":"page_detail"},"appendDivId":"addLandingPage","formUrl":"landing_pages","fieldWrapper":"landing_pages","formId":"addLandingPageForm"},Util._addFunctionProcess)', yii\web\View::POS_END,'my_option');
?>