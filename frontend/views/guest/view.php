<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\Guest */

$this->title = $model->guest_id;
$this->params['breadcrumbs'][] = ['label' => 'Guests', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="guest-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'guest_id' => $model->guest_id, 'events_id' => $model->events_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'guest_id' => $model->guest_id, 'events_id' => $model->events_id], [
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
            'guest_id',
            'events_id',
            'guest_name',
            'guest_gender',
            'guest_age',
            'guest_email:email',
            'invited',
            'attending',
            'declined',
            'rsvp',
        ],
    ]) ?>

</div>
