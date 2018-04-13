<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "shopping_list".
 *
 * @property int $list_id
 * @property int $events_id
 * @property string $item_name
 * @property string $purchase
 * @property int $unit
 * @property double $price
 * @property string $quantity_mode
 * @property int $quantity
 * @property string $list_note
 *
 * @property Events $events
 */
class ShoppingList extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'shopping_list';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['list_id', 'events_id', 'item_name', 'purchase', 'unit', 'price', 'quantity_mode', 'quantity', 'list_note'], 'required'],
            [['list_id', 'events_id', 'unit', 'quantity'], 'integer'],
            [['purchase'], 'string'],
            [['price'], 'number'],
            [['item_name', 'quantity_mode', 'list_note'], 'string', 'max' => 45],
            [['list_id', 'events_id'], 'unique', 'targetAttribute' => ['list_id', 'events_id']],
            [['events_id'], 'exist', 'skipOnError' => true, 'targetClass' => Events::className(), 'targetAttribute' => ['events_id' => 'events_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'list_id' => 'List ID',
            'events_id' => 'Events ID',
            'item_name' => 'Item Name',
            'purchase' => 'Purchase',
            'unit' => 'Unit',
            'price' => 'Price',
            'quantity_mode' => 'Quantity Mode',
            'quantity' => 'Quantity',
            'list_note' => 'List Note',
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
