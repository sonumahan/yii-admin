<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "edge_volunteer".
 *
 * @property integer $id
 * @property integer $reference_id
 * @property integer $group_id
 * @property integer $course_id
 * @property integer $blog_id
 */
class EdgeVolunteer extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'edge_volunteer';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['reference_id', 'group_id', 'course_id', 'blog_id'], 'required'],
            [['reference_id', 'group_id', 'course_id', 'blog_id'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'reference_id' => 'Reference ID',
            'group_id' => 'Group ID',
            'course_id' => 'Course ID',
            'blog_id' => 'Blog ID',
        ];
    }

    public function getVolunteers() {
        return $this->hasOne(Volunteer::className(),["id"=>"reference_id"]);
    }
}
