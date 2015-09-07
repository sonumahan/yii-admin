<?php 
namespace backend\components;
use Yii;
class Controller extends \yii\web\Controller {
    public function beforeAction($action)
    {	
    	if(parent::beforeAction($action)) {
    		if(Yii::$app->user->isGuest && !($action->controller->id == 'site' && $action->id == 'login')) {
        		$this->redirect(array('site/login',"referrer"=>Yii::$app->request->referrer));
    		}
    		return true;
    	}
        
        return false;
    }
}

?>