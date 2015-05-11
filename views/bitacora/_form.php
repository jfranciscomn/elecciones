<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Bitacora */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="bitacora-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'fecha')->textInput() ?>

    <?= $form->field($model, 'usuario_id')->textInput() ?>

    <?= $form->field($model, 'accion_id')->textInput() ?>

    <?= $form->field($model, 'datos_enviados')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'HTTP_USER_AGENT')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'HTTP_HOST')->textInput(['maxlength' => 45]) ?>

    <?= $form->field($model, 'SERVER_PORT')->textInput(['maxlength' => 45]) ?>

    <?= $form->field($model, 'REMOTE_ADDR')->textInput(['maxlength' => 45]) ?>

    <?= $form->field($model, 'REMOTE_PORT')->textInput(['maxlength' => 45]) ?>

    <?= $form->field($model, 'SERVER_PROTOCOL')->textInput(['maxlength' => 45]) ?>

    <?= $form->field($model, 'REQUEST_METHOD')->textInput(['maxlength' => 45]) ?>

    <?= $form->field($model, 'REQUEST_URI')->textInput(['maxlength' => 145]) ?>

    <?= $form->field($model, 'resultado')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
