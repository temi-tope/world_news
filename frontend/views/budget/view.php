<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\Budget */

$this->title = $model->budget_id;
$this->params['breadcrumbs'][] = ['label' => 'Budgets', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="budget-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'budget_id' => $model->budget_id, 'events_id' => $model->events_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'budget_id' => $model->budget_id, 'events_id' => $model->events_id], [
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
            'budget_id',
            'events_id',
            'budget_name',
            'paid_amount',
            'budget_type',
            'budget_amount',
            'budget_note',
        ],
    ]) ?>

</div>
