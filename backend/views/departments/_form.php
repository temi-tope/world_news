<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\models\Branches;
use backend\models\Companies;
/* @var $this yii\web\View */
/* @var $model backend\models\departments */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="departments-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model,'branches_branch_id')->dropDownList(
        ArrayHelper::map(Branches::find()->all(),'branch_id','branch_name'),
        ['prompt'=>'Select Branch']
    )
     ?>

    <?= $form->field($model, 'department_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model,'companies_company_id')->dropDownList(
        ArrayHelper::map(Companies::find()->all(),'company_id','comapny_name'),
        ['prompt'=>'Select Company']
    )
     ?>

    <?= $form->field($model, 'department_status')->dropDownList([ 'active' => 'Active', 'inactive' => 'Inactive', ], ['prompt' => '']) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
