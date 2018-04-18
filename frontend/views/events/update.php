<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Events */

$this->title = 'Update: '. $model->events_name;
$this->params['breadcrumbs'][] = ['label' => 'Events', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->events_id, 'url' => ['view', 'id' => $model->events_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="events-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
