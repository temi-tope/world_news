<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Guest;

/**
 * GuestSearch represents the model behind the search form of `frontend\models\Guest`.
 */
class GuestSearch extends Guest
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['guest_id', 'events_id', 'guest_age'], 'integer'],
            [['guest_name', 'guest_gender', 'guest_email', 'invited', 'attending', 'declined', 'rsvp'], 'safe'],
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
        $query = Guest::find();

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
            'guest_id' => $this->guest_id,
            'events_id' => $this->events_id,
            'guest_age' => $this->guest_age,
        ]);

        $query->andFilterWhere(['like', 'guest_name', $this->guest_name])
            ->andFilterWhere(['like', 'guest_gender', $this->guest_gender])
            ->andFilterWhere(['like', 'guest_email', $this->guest_email])
            ->andFilterWhere(['like', 'invited', $this->invited])
            ->andFilterWhere(['like', 'attending', $this->attending])
            ->andFilterWhere(['like', 'declined', $this->declined])
            ->andFilterWhere(['like', 'rsvp', $this->rsvp]);

        return $dataProvider;
    }
}
