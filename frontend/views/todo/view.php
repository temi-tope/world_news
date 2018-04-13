<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\Todo */

$this->title = $model->todo_id;
$this->params['breadcrumbs'][] = ['label' => 'Todos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="todo-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'todo_id' => $model->todo_id, 'events_id' => $model->events_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'todo_id' => $model->todo_id, 'events_id' => $model->events_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'todo_id',
            'events_id',
            'task',
            'completed',
            'todo_notes',
        ],
    ]) ?>

</div>
