<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\ShoppingListSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Shopping Lists';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="shopping-list-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Shopping List', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'list_id',
            'events_id',
            'item_name',
            'purchase',
            'unit',
            //'price',
            //'quantity_mode',
            //'quantity',
            //'list_note',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
