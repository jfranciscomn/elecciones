<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Incidente */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="incidente-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'colonia_id')->textInput() ?>

    <?= $form->field($model, 'poblacion_id')->textInput() ?>

    <?= $form->field($model, 'sindicatura_id')->textInput() ?>

    <?= $form->field($model, 'municipio_id')->textInput() ?>

    <?= $form->field($model, 'operativo_id')->textInput() ?>

    <?= $form->field($model, 'subclase2_incidente_id')->textInput() ?>

    <?= $form->field($model, 'subclase_incidente_id')->textInput() ?>

    <?= $form->field($model, 'clase_incidente_id')->textInput() ?>

    <?= $form->field($model, 'fecha')->textInput() ?>

    <?= $form->field($model, 'usuario_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
