<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\Guest */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="guest-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'events_id')->textInput() ?>

    <?= $form->field($model, 'guest_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'guest_gender')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'guest_age')->textInput() ?>

    <?= $form->field($model, 'guest_email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'invited')->dropDownList([ 'YES' => 'YES', 'NO' => 'NO', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'attending')->dropDownList([ 'YES' => 'YES', 'NO' => 'NO', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'declined')->dropDownList([ 'YES' => 'YES', 'NO' => 'NO', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'rsvp')->dropDownList([ 'YES' => 'YES', 'NO' => 'NO', ], ['prompt' => '']) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
