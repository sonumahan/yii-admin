<?php
use yii\helpers\Html;

$this->title = "Edit page";
$this->params["breadcrumbs"][] = ["label"=>"Manage pages","url"=>"/admin/page"];
$this->params["breadcrumbs"][] = $this->title;
?>
<h1><?php echo Html::encode($this->title);?></h1>
<div id="editPage"></div>
<?php
$this->registerJs('Util._ajax("pages/'.Yii::$app->request->getQueryParam("id").'/edit","GET","json","",{"table_host":{"label":"Page Type","type":"hidden","value_from":"pages"},"version":{"label":"Page Status","type":"select","value_from":{"draft":"Draft","published":"Published"},"associated":"page"},"title_doc":{"label":"Document Title","type":"text","associated":"page"},"title_heading":{"label":"Headline","type":"text","associated":"page"},"title_link":{"label":"URL ID","type":"text"},"title_nav":{"label":"Navigation Link","type":"text","associated":"page"},"menu":{"label":"Parent","type":"select","associated":"page"},"seo_description":{"label":"SEO Description","type":"text","associated":"page"},"seo_keywords":{"label":"SEO Keywords","type":"text","associated":"page"},"content":{"label":"Content","type":"textarea","associated":"page"},"content2":{"label":"Secondary Content","type":"textarea","associated":"page"},"formUrl":"pages/'.Yii::$app->request->getQueryParam("id").'","appendDivId":"editPage","fieldWrapper":"page_index","formId":"editPageForm"},Util._editFunctionProcess)', yii\web\View::POS_END,'my_options');
?>

