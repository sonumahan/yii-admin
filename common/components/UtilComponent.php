<?php 
namespace common\components;
 
use Yii;
use yii\base\Component;
use yii\base\InvalidConfigException;

class UtilComponent extends Component {
    
    public function getStudentToRegisterInClass($cID,$term = "") {
        $sql = Yii::$app->db->createCommand("SELECT id,CONCAT_WS(' ',first_name,last_name) as 'label' FROM volunteers WHERE 1=1 AND id NOT IN(SELECT reference_id FROM edge_volunteer WHERE 1=1 AND course_id=$cID) AND CONCAT_WS(' ',first_name,last_name) LIKE '%$term%' AND validated=1")->queryAll();
        return $sql;
    }
    
    public function assignStudent($cID,$sID,$model) {
        $db = Yii::$app->db;
        $countSql = $db->createCommand("SELECT count(id) FROM edge_volunteer WHERE 1=1 AND course_id=$cID AND reference_id=$sID")->queryScalar();
        if(!$countSql) {
            $model->course_id = $cID;
            $model->reference_id = $sID;
            $model->group_id = 0;
            $model->blog_id = 0;
            $model->save();
        }
    }
    
    public function getSlideOrder($cID,$week) {
        $db = Yii::$app->db;
        $sql = "SELECT MAX(slide_order) as 'max' FROM edge_slide WHERE 1=1 AND course_id=$cID AND week = $week";
        $row = $db->createCommand($sql)->queryScalar();
        return (int)($row+1);
    }
    
    public function getWeekRange($ween_num) {
        $rAr = [];
        for($i=1;$i<=$ween_num;$i++) {
           $rAr[$i] = $i; 
        }
        return $rAr;
    }
}
