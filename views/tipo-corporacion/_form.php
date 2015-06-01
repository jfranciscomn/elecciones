<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TipoCorporacion */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tipo-corporacion-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'tipo_corporacion_nombre')->textInput(['maxlength' => 145]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
