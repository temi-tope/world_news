<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\db\ActiveQuery;

/* @var $this yii\web\View */
/* @var $model frontend\models\Events */
?>
<div class="events-view container" >
<?php
$this->title = $model->events_name;
$this->params['breadcrumbs'][] = ['label' => 'Events', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>


    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->events_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->events_id], [
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
            'events_name',
            'location',
            'events_date',
            'notes',
           
            
        ],
    ]) ?>
<?php if($modelBudget !== null){?>
     <?= DetailView::widget([
        'model' => $modelBudget,
        'attributes' => [
            'budget_name', 
            'paid_amount',
            'budget_type',
            'budget_amount',
            'budget_note',
        ],
    ]) ?>

<?php }
else{
    ?>
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            
        ],
    ]) ?>
<?php } ?>
     
</div>
