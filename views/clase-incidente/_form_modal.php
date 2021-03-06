<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ClaseIncidente */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="clase-incidente-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'clase_incidente_nombre')->textInput(['maxlength' => 415]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Crear' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
