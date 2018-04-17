<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\EventsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="events-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'class'  => "form-inline",
    ]); ?>
    <div class="form-group">
     <div class="selectwidth"><?= $form->field($model, 'events_name') ?></div>
     </div>
     <span> <?= Html::submitButton('Search', ['class' => 'btn btn-default ']) ?></span>

    <?php ActiveForm::end(); ?>

</div>
