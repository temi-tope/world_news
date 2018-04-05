<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\departments;

/**
 * DepartmentsSearch represents the model behind the search form of `backend\models\departments`.
 */
class DepartmentsSearch extends departments
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['department_id', 'branches_branch_id', 'companies_company_id'], 'integer'],
            [['department_name', 'deparment_created_date', 'department_status'], 'safe'],
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
        $query = departments::find();

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
            'department_id' => $this->department_id,
            'branches_branch_id' => $this->branches_branch_id,
            'companies_company_id' => $this->companies_company_id,
            'deparment_created_date' => $this->deparment_created_date,
        ]);

        $query->andFilterWhere(['like', 'department_name', $this->department_name])
            ->andFilterWhere(['like', 'department_status', $this->department_status]);

        return $dataProvider;
    }
}
