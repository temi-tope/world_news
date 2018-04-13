<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Events;

/**
 * EventsSearch represents the model behind the search form of `frontend\models\Events`.
 */
class EventsSearch extends Events
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['events_id'], 'integer'],
            [['events_name', 'location', 'events_date', 'notes'], 'safe'],
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
        $query = Events::find();

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
            'events_id' => $this->events_id,
            'events_date' => $this->events_date,
        ]);

        $query->andFilterWhere(['like', 'events_name', $this->events_name])
            ->andFilterWhere(['like', 'location', $this->location])
            ->andFilterWhere(['like', 'notes', $this->notes]);

        return $dataProvider;
    }
}
