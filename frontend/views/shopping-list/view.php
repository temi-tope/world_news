<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\ShoppingList */

$this->title = $model->list_id;
$this->params['breadcrumbs'][] = ['label' => 'Shopping Lists', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="shopping-list-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'list_id' => $model->list_id, 'events_id' => $model->events_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'list_id' => $model->list_id, 'events_id' => $model->events_id], [
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
            'list_id',
            'events_id',
            'item_name',
            'purchase',
            'unit',
            'price',
            'quantity_mode',
            'quantity',
            'list_note',
        ],
    ]) ?>

</div>
