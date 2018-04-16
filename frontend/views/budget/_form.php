<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use frontend\models\Events;


/* @var $this yii\web\View */
/* @var $model frontend\models\Budget */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="budget-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'events_id')->dropDownList(
        ArrayHelper::map(Events::find()->all(),'events_id','events_name'),
        ['prompt'=>'Select Events']
    )
     ?>

    <?= $form->field($model, 'budget_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'paid_amount')->textInput() ?>

    <?= $form->field($model, 'budget_type')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'budget_amount')->textInput() ?>

    <?= $form->field($model, 'budget_note')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
