<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Persona */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="persona-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'incidente_id')->textInput() ?>

    <?= $form->field($model, 'estado_persona_id')->textInput() ?>

    <?= $form->field($model, 'persona_nombre')->textInput(['maxlength' => 145]) ?>

    <?= $form->field($model, 'edad')->textInput() ?>

    <?= $form->field($model, 'sexo')->textInput() ?>

    <?= $form->field($model, 'domicilio')->textInput(['maxlength' => 256]) ?>

    <?= $form->field($model, 'colonia_id')->textInput() ?>

    <?= $form->field($model, 'poblacion_id')->textInput() ?>

    <?= $form->field($model, 'sindicatura_id')->textInput() ?>

    <?= $form->field($model, 'municipio_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
