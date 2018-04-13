<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\ShoppingList */

$this->title = 'Create Shopping List';
$this->params['breadcrumbs'][] = ['label' => 'Shopping Lists', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="shopping-list-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
