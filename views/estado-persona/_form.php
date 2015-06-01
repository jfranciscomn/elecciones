<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\EstadoPersona */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="estado-persona-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'estado_persona_nombre')->textInput(['maxlength' => 145]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Crear' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
