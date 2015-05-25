<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Subclase2Incidente */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="subclase2-incidente-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'subclase_incidente_id')->textInput() ?>

    <?= $form->field($model, 'clase_incidente_id')->textInput() ?>

    <?= $form->field($model, 'subclase2_incidente_nombre')->textInput(['maxlength' => 145]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>