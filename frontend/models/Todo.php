<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "todo".
 *
 * @property int $todo_id
 * @property int $events_id
 * @property string $task
 * @property string $completed
 * @property string $todo_notes
 *
 * @property Events $events
 */
class Todo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'todo';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['todo_id', 'events_id', 'task', 'completed', 'todo_notes'], 'required'],
            [['todo_id', 'events_id'], 'integer'],
            [['completed'], 'string'],
            [['task'], 'string', 'max' => 45],
            [['todo_notes'], 'string', 'max' => 200],
            [['todo_id', 'events_id'], 'unique', 'targetAttribute' => ['todo_id', 'events_id']],
            [['events_id'], 'exist', 'skipOnError' => true, 'targetClass' => Events::className(), 'targetAttribute' => ['events_id' => 'events_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'todo_id' => 'Todo ID',
            'events_id' => 'Events ID',
            'task' => 'Task',
            'completed' => 'Completed',
            'todo_notes' => 'Todo Notes',
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
