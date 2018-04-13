<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\ShoppingList */

$this->title = 'Update Shopping List: {nameAttribute}';
$this->params['breadcrumbs'][] = ['label' => 'Shopping Lists', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->list_id, 'url' => ['view', 'list_id' => $model->list_id, 'events_id' => $model->events_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="shopping-list-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
