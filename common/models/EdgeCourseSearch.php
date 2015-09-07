<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\EdgeCourse;

/**
 * EdgeCourseSearch represents the model behind the search form about `common\models\EdgeCourse`.
 */
class EdgeCourseSearch extends EdgeCourse
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['course_id', 'week_num', 'associated_cid'], 'integer'],
            [['name', 'starting_date', 'status', 'detail', 'is_oriantation', 'sfcoID', 'courseImage'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = EdgeCourse::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'course_id' => $this->course_id,
            'starting_date' => $this->starting_date,
            'week_num' => $this->week_num,
            'associated_cid' => $this->associated_cid,
            "status" => "active",
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'status', $this->status])
            ->andFilterWhere(['like', 'detail', $this->detail])
            ->andFilterWhere(['like', 'is_oriantation', $this->is_oriantation])
            ->andFilterWhere(['like', 'sfcoID', $this->sfcoID])
            ->andFilterWhere(['like', 'courseImage', $this->courseImage]);

        return $dataProvider;
    }
}
