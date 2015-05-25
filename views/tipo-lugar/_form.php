<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TipoLugar */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tipo-lugar-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'tipo_lugar_nombre')->textInput(['maxlength' => 145]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Crear' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
