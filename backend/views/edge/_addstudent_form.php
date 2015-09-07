<?php 

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\jui\AutoComplete;
use yii\web\JsExpression;

use common\models\EdgeCourse;

$courseAr = ArrayHelper::map(EdgeCourse::find(["status"=>"active"])->all(),"course_id","name");

?>
<?php $form = ActiveForm::begin(); ?>
	<?= $form->field($model, 'course_id')->dropDownList($courseAr,["prompt"=>"Choose..."]); ?>
	<div class="form-group">
		<label for="edgevolunteer-reference_id" class="control-label">Student Name</label>
		<?php echo AutoComplete::widget([
    		'name' => 'State',    
    		'id' => 'edgevolunteer-reference_id',
                'options' => ["class"=>"form-control"],
    		'clientOptions' => [
        		'source' => new JsExpression("function(request, response) {
    				$.getJSON('/admin/edge/getstudentforen/'+jQuery('#edgevolunteer-course_id').val(), {
        				term: jQuery('#edgevolunteer-reference_id').val()
    				}, response);
				}"), 
        		'minLength' => "3",
         		'select' => new JsExpression("function( event, ui ) {
        		var text = '<div class=\'col-xs-3\'><div class=\'checkbox\'><label><input type=\'checkbox\' value=\''+ui.item.id+'\' name=\'enrollStudent[]\'>'+ui.item.label+'</label></div></div>';
                        jQuery('#assignS').show().append(text);
                        jQuery('#edgevolunteer-reference_id').val('');
                        return false;
     		}")],
     	]);
     	?>
	</div>
        <div class="row" id="" style="">
            
        </div>
        <div class="row" id="assignS" style="display: none;">
            <div class='col-xs-12'><a href="javascript:void(0)" onclick="Util._checkAll('assignS')">Check All</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="javascript:void(0)" onclick="Util._unCheckAll('assignS')">Uncheck All</a></div>
        </div>
	<div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Enroll Student' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>
<?php ActiveForm::end(); 
