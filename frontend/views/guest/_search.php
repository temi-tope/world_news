<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\GuestSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="guest-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'guest_id') ?>

    <?= $form->field($model, 'events_id') ?>

    <?= $form->field($model, 'guest_name') ?>

    <?= $form->field($model, 'guest_gender') ?>

    <?= $form->field($model, 'guest_age') ?>

    <?php // echo $form->field($model, 'guest_email') ?>

    <?php // echo $form->field($model, 'invited') ?>

    <?php // echo $form->field($model, 'attending') ?>

    <?php // echo $form->field($model, 'declined') ?>

    <?php // echo $form->field($model, 'rsvp') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
