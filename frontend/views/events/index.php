<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\EventsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

// $this->title = 'Events';
// $this->params['breadcrumbs'][] = $this->title;

$this->title = 'My Event';
?>
<section>
    <div class="container-fluid">
        <div class="row">
            <figure>
        <img src="event-management.jpg" width="100%" height="50%">
            </figure>
        </div>
    </div>
    </section>

<div class="events-index">
<p><?= Html::a('Create Events', ['create'], ['class' => 'btn btn-default ']) ?></p>
<div class="jumbotron">
    <h1><?= Html::encode($this->title) ?></h1>
    <?php  echo $this->render('_search', ['model' => $searchModel]); ?>
    
</div>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        // 'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'events_name',
            'location',
            'events_date',
            'notes',

            ['class' => 'yii\grid\ActionColumn'],

            
        ],
    ]); ?>
</div>
