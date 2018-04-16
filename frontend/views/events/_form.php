<?php
use dosamigos\datetimepicker\DateTimePicker;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\Events */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="events-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'events_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'location')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'events_date')->widget(DateTimePicker::className(), [
    'language' => 'eng',
    'size' => 'ms',
    // 'template' => '<div class="well well-sm" style="background-color:#fff; width:250px">{input}</div>',
    'pickButtonIcon' => 'glyphicon glyphicon-time',
    'inline' => false,
    'clientOptions' => [
        'startView' => 1,
        'minView' => 0,
        'maxView' => 1,
        'autoclose' => true,

        'format' => 'yyyy-MM-dd - HH:ii P', // if inline = true
        // 'format' => 'HH:ii P', // if inline = false
        'todayBtn' => true
 
    ]
]);?>

    <?= $form->field($model, 'notes')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
