<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\ShoppingList;

/**
 * ShoppingListSearch represents the model behind the search form of `frontend\models\ShoppingList`.
 */
class ShoppingListSearch extends ShoppingList
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['list_id', 'events_id', 'unit', 'quantity'], 'integer'],
            [['item_name', 'purchase', 'quantity_mode', 'list_note'], 'safe'],
            [['price'], 'number'],
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
        $query = ShoppingList::find();

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
            'list_id' => $this->list_id,
            'events_id' => $this->events_id,
            'unit' => $this->unit,
            'price' => $this->price,
            'quantity' => $this->quantity,
        ]);

        $query->andFilterWhere(['like', 'item_name', $this->item_name])
            ->andFilterWhere(['like', 'purchase', $this->purchase])
            ->andFilterWhere(['like', 'quantity_mode', $this->quantity_mode])
            ->andFilterWhere(['like', 'list_note', $this->list_note]);

        return $dataProvider;
    }
}
