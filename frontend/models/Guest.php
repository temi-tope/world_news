<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "guest".
 *
 * @property int $guest_id
 * @property int $events_id
 * @property string $guest_name
 * @property string $guest_gender
 * @property int $guest_age
 * @property string $guest_email
 * @property string $invited
 * @property string $attending
 * @property string $declined
 * @property string $rsvp
 *
 * @property Events $events
 */
class Guest extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'guest';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['events_id', 'guest_name', 'guest_gender', 'guest_age', 'guest_email', 'invited', 'attending', 'declined', 'rsvp'], 'required'],
            [['events_id', 'guest_age'], 'integer'],
            [['invited', 'attending', 'declined', 'rsvp'], 'string'],
            [['guest_name', 'guest_gender'], 'string', 'max' => 45],
            [['guest_email'], 'string', 'max' => 100],
            [['events_id'], 'exist', 'skipOnError' => true, 'targetClass' => Events::className(), 'targetAttribute' => ['events_id' => 'events_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'guest_id' => 'Guest ID',
            'events_id' => 'Events ID',
            'guest_name' => 'Guest Name',
            'guest_gender' => 'Guest Gender',
            'guest_age' => 'Guest Age',
            'guest_email' => 'Guest Email',
            'invited' => 'Invited',
            'attending' => 'Attending',
            'declined' => 'Declined',
            'rsvp' => 'Rsvp',
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
