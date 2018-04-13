<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Budget;

/**
 * BudgetSearch represents the model behind the search form of `frontend\models\Budget`.
 */
class BudgetSearch extends Budget
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['budget_id', 'events_id'], 'integer'],
            [['budget_name', 'budget_type', 'budget_note'], 'safe'],
            [['paid_amount', 'budget_amount'], 'number'],
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
        $query = Budget::find();

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
            'budget_id' => $this->budget_id,
            'events_id' => $this->events_id,
            'paid_amount' => $this->paid_amount,
            'budget_amount' => $this->budget_amount,
        ]);

        $query->andFilterWhere(['like', 'budget_name', $this->budget_name])
            ->andFilterWhere(['like', 'budget_type', $this->budget_type])
            ->andFilterWhere(['like', 'budget_note', $this->budget_note]);

        return $dataProvider;
    }
}
