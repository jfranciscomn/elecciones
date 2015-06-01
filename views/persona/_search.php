<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\search\PersonaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="persona-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'persona_id') ?>

    <?= $form->field($model, 'incidente_id') ?>

    <?= $form->field($model, 'estado_persona_id') ?>

    <?= $form->field($model, 'persona_nombre') ?>

    <?= $form->field($model, 'edad') ?>

    <?php // echo $form->field($model, 'sexo') ?>

    <?php // echo $form->field($model, 'domicilio') ?>

    <?php // echo $form->field($model, 'colonia_id') ?>

    <?php // echo $form->field($model, 'poblacion_id') ?>

    <?php // echo $form->field($model, 'sindicatura_id') ?>

    <?php // echo $form->field($model, 'municipio_id') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
