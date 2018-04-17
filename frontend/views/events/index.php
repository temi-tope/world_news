<?php

use yii\helpers\Html;
use yii\widgets\ListView;
use yii\bootstrap\Modal;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\EventsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

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


<div class="events-index container ">

<div class="row">
    <div class="col-xs-12 col-sm-6 col-md-8">
        <div class="jumbotron">
            <h1><?= Html::encode($this->title) ?></h1>
            <?php  echo $this->render('_search', ['model' => $searchModel]); ?>
        </div>
    </div>
    <div class="col-xs-6 col-md-4">
        <div class="jumbotron">
            <p><?= Html::button('Events', ['value'=>Url::to('index.php?r=events/create'),'class' => 'btn btn-default btn-lg glyphicon glyphicon-plus', 'id'=>'modalButton']) ?></p>
        <?php
        Modal::begin([
            'header'=>'<h2>Create Event</h2>',
            'id'=> 'modal',
            'size'=>'modal-lg',
        ]);
        echo "<div id='modalContent'></div>";
        Modal::end();
        ?>
        </div>
    </div>
</div>

    <?= ListView::widget([
        'dataProvider' => $dataProvider,
        'itemOptions' => ['class' => 'item'],
        'itemView' => function ($model, $key, $index, $widget) {
            ?>
            
        <div class="col-lg-3 colcust3">
        <div class="panel panel-default">
            <div class="panel-heading panelhead">
                <h1 class="panel-title text-uppercase"><?= Html::a(Html::encode($model->events_name), ['view', 'id' => $model->events_id])?></h1>
            </div>
            <div class="panel-body">
                <p class="text-capitalize"> <strong>Location: </strong><?=$model->location?></p>
                <p class="text-capitalize"> <strong>Date:</strong> <?=$model->events_date?></p>
                <p class="text-capitalize"> <strong>Notes:</strong> <?=$model->notes?></p>
            </div>  
        </div>
        </div>
        
              <?php  
              }
        ]);
              ?>