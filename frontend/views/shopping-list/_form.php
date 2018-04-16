<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\ShoppingList */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="shopping-list-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'events_id')->textInput() ?>

    <?= $form->field($model, 'item_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'purchase')->dropDownList([ 'YES' => 'YES', 'NO' => 'NO', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'unit')->textInput() ?>

    <?= $form->field($model, 'price')->textInput() ?>

    <?= $form->field($model, 'quantity_mode')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'quantity')->textInput() ?>

    <?= $form->field($model, 'list_note')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
