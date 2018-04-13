<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\BudgetSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="budget-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'budget_id') ?>

    <?= $form->field($model, 'events_id') ?>

    <?= $form->field($model, 'budget_name') ?>

    <?= $form->field($model, 'paid_amount') ?>

    <?= $form->field($model, 'budget_type') ?>

    <?php // echo $form->field($model, 'budget_amount') ?>

    <?php // echo $form->field($model, 'budget_note') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
