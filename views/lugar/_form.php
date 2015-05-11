<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Lugar */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="lugar-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'tipo_lugar_id')->textInput() ?>

    <?= $form->field($model, 'poblacion_id')->textInput() ?>

    <?= $form->field($model, 'sindicatura_id')->textInput() ?>

    <?= $form->field($model, 'municipio_id')->textInput() ?>

    <?= $form->field($model, 'lugar_nombre')->textInput(['maxlength' => 256]) ?>

    <?= $form->field($model, 'colonia_id')->textInput() ?>

    <?= $form->field($model, 'direccion')->textInput(['maxlength' => 256]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
