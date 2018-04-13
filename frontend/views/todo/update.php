<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Todo */

$this->title = 'Update Todo: {nameAttribute}';
$this->params['breadcrumbs'][] = ['label' => 'Todos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->todo_id, 'url' => ['view', 'todo_id' => $model->todo_id, 'events_id' => $model->events_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="todo-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
