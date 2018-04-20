<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "events".
 *
 * @property int $events_id
 * @property string $events_name
 * @property string $location
 * @property string $events_date
 * @property string $notes
 * @property int $user_id
 *
 * @property Budget[] $budgets
 * @property User $user
 * @property Guest[] $guests
 * @property ShoppingList[] $shoppingLists
 * @property Todo[] $todos
 */
class Events extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'events';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['events_name', 'location', 'events_date', 'notes'], 'required'],
            [['user_id'], 'integer'],
            [['events_name', 'location', 'events_date'], 'string', 'max' => 45],
            [['notes'], 'string', 'max' => 100],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'events_id' => 'Events ID',
            'events_name' => 'Events Name',
            'location' => 'Location',
            'events_date' => 'Events Date',
            'notes' => 'Notes',
            'user_id' => 'User ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBudgets()
    {
        return $this->hasMany(Budget::className(), ['events_id' => 'events_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGuests()
    {
        return $this->hasMany(Guest::className(), ['events_id' => 'events_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getShoppingLists()
    {
        return $this->hasMany(ShoppingList::className(), ['events_id' => 'events_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTodos()
    {
        return $this->hasMany(Todo::className(), ['events_id' => 'events_id']);
    }
}
