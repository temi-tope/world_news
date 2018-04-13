<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Todo;

/**
 * TodoSearch represents the model behind the search form of `frontend\models\Todo`.
 */
class TodoSearch extends Todo
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['todo_id', 'events_id'], 'integer'],
            [['task', 'completed', 'todo_notes'], 'safe'],
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
        $query = Todo::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'todo_id' => $this->todo_id,
            'events_id' => $this->events_id,
        ]);

        $query->andFilterWhere(['like', 'task', $this->task])
            ->andFilterWhere(['like', 'completed', $this->completed])
            ->andFilterWhere(['like', 'todo_notes', $this->todo_notes]);

        return $dataProvider;
    }
}
