<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "budget".
 *
 * @property int $budget_id
 * @property int $events_id
 * @property string $budget_name
 * @property double $paid_amount
 * @property string $budget_type
 * @property double $budget_amount
 * @property string $budget_note
 *
 * @property Events $events
 */
class Budget extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'budget';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['budget_id', 'events_id', 'budget_name', 'paid_amount', 'budget_type', 'budget_amount', 'budget_note'], 'required'],
            [['budget_id', 'events_id'], 'integer'],
            [['paid_amount', 'budget_amount'], 'number'],
            [['budget_name', 'budget_type'], 'string', 'max' => 45],
            [['budget_note'], 'string', 'max' => 100],
            [['budget_id', 'events_id'], 'unique', 'targetAttribute' => ['budget_id', 'events_id']],
            [['events_id'], 'exist', 'skipOnError' => true, 'targetClass' => Events::className(), 'targetAttribute' => ['events_id' => 'events_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'budget_id' => 'Budget ID',
            'events_id' => 'Events ID',
            'budget_name' => 'Budget Name',
            'paid_amount' => 'Paid Amount',
            'budget_type' => 'Budget Type',
            'budget_amount' => 'Budget Amount',
            'budget_note' => 'Budget Note',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEvents()
    {
        return $this->hasOne(Events::className(), ['events_id' => 'events_id']);
    }
}
