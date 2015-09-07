<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "edge_course".
 *
 * @property integer $course_id
 * @property string $name
 * @property string $starting_date
 * @property string $status
 * @property string $detail
 * @property integer $week_num
 * @property string $is_oriantation
 * @property integer $associated_cid
 * @property string $sfcoID
 * @property string $courseImage
 */
class EdgeCourse extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'edge_course';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'starting_date', 'detail','week_num'], 'required'],
            [['starting_date'], 'safe'],
            [['week_num', 'associated_cid'], 'integer'],
            [['is_oriantation'], 'string'],
            [['name', 'status', 'detail'], 'string', 'max' => 255],
            [['sfcoID'], 'string', 'max' => 25],
            [['courseImage'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'course_id' => 'Course Name',
            'name' => 'Name',
            'starting_date' => 'Starting Date',
            'status' => 'Status',
            'detail' => 'Detail',
            'week_num' => 'Number of weeks',
            'is_oriantation' => 'Is orientation program',
            'associated_cid' => 'Associate orientation course with regular course',
            'sfcoID' => 'Sfco ID',
            'courseImage' => 'Upload School logo',
        ];
    }

    public function getVolunteers() {
        return $this->hasMany(Volunteer::className(),['id'=>"reference_id"])->viaTable('edge_volunteer',['course_id'=>'course_id']);
    }
}
