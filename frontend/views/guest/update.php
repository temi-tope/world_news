<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Guest */

$this->title = 'Update Guest: {nameAttribute}';
$this->params['breadcrumbs'][] = ['label' => 'Guests', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->guest_id, 'url' => ['view', 'guest_id' => $model->guest_id, 'events_id' => $model->events_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="guest-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
