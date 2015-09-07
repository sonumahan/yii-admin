<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "edge_group".
 *
 * @property integer $group_id
 * @property integer $course_id
 * @property string $name
 * @property integer $status
 * @property string $sfgID
 */
class EdgeGroup extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'edge_group';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['course_id', 'name'], 'required'],
            [['course_id', 'status'], 'integer'],
            [['name'], 'string', 'max' => 50],
            [['sfgID'], 'string', 'max' => 25]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'group_id' => 'Group ID',
            'course_id' => 'Course ID',
            'name' => 'Name',
            'status' => 'Status',
            'sfgID' => 'Sfg ID',
        ];
    }
}
