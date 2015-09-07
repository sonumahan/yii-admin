<?php
use yii\helpers\Html;

$this->title = "Edit landing page";
$this->params["breadcrumbs"][] = ["label"=>"Manage landing pages","url"=>"/admin/landingpage"];
$this->params["breadcrumbs"][] = $this->title;
?>
<h1><?php echo Html::encode($this->title); ?></h1>
<div id="editLandingPage"></div>
<?php
$this->registerJs('Util._ajax("landing_pages/'.Yii::$app->request->getQueryParam("id").'/edit","GET","json","",{"version":{"label":"Page Status","type":"select","value_from":{"draft":"Draft","published":"published"},"associated":"page_detail"},"table_host":{"label":"","type":"hidden","value_from":"volunteer_opportunities_landing_pages"},"title_doc":{"label":"Document Title","type":"text","associated":"page_detail"},"title_heading":{"label":"Headline","type":"text","associated":"page_detail"},"title_link":{"label":"URL ID","type":"text"},"h1_optimized":{"label":"H1 optimized","type":"text","associated":"page_detail"},"h2_optimized":{"label":"H2 optimized","type":"text","associated":"page_detail"},"h3_optimized":{"label":"H3 optimized","type":"textarea","associated":"page_detail"},"sidebar_text":{"label":"Right Sidebar Text","type":"text","associated":"page_detail"},"quote":{"label":"Quote","type":"text","associated":"page_detail"},"content":{"label":"Content","type":"textarea","associated":"page_detail"},"seo_keywords":{"label":"SEO Keywords","type":"text","associated":"page_detail"},"seo_description":{"label":"SEO Description","type":"text","associated":"page_detail"},"region_id":{"label":"Region","type":"select","associated":"page_detail"},"country":{"label":"Country","type":"text","associated":"page_detail"},"appendDivId":"editLandingPage","formUrl":"landing_pages/'.Yii::$app->request->getQueryParam("id").'","fieldWrapper":"landing_pages","formId":"edirLandingPageForm"},Util._editFunctionProcess)', yii\web\View::POS_END,'my_options');
?>
