<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "edge_slide".
 *
 * @property integer $id
 * @property integer $week
 * @property integer $course_id
 * @property string $status
 * @property string $detail
 * @property string $title
 * @property string $course_name
 * @property integer $slide_order
 */
class EdgeSlide extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'edge_slide';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['week', 'course_id', 'detail', 'title', 'course_name', 'slide_order'], 'required'],
            [['week', 'course_id', 'slide_order'], 'integer'],
            [['detail'], 'string'],
            [['status', 'title', 'course_name'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'week' => 'Week',
            'course_id' => 'Course ID',
            'status' => 'Status',
            'detail' => 'Detail',
            'title' => 'Title',
            'course_name' => 'Course Name',
            'slide_order' => 'Slide Order',
        ];
    }
}
