<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\BudgetSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Budgets';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="budget-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('', ['create'], ['class' => 'btn btn-success glyphicon glyphicon-plus']) ?>
    </p>

    <?= GridView::widget([
        'class' =>'table-hover table-dark',
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'budget_id',
            'events_id',
            'budget_name',
            'paid_amount',
            'budget_type',
            //'budget_amount',
            //'budget_note',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
