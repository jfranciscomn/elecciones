<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\search\IncidenteSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="incidente-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'incidente_id') ?>

    <?= $form->field($model, 'colonia_id') ?>

    <?= $form->field($model, 'poblacion_id') ?>

    <?= $form->field($model, 'sindicatura_id') ?>

    <?= $form->field($model, 'municipio_id') ?>

    <?php // echo $form->field($model, 'operativo_id') ?>

    <?php // echo $form->field($model, 'subclase2_incidente_id') ?>

    <?php // echo $form->field($model, 'subclase_incidente_id') ?>

    <?php // echo $form->field($model, 'clase_incidente_id') ?>

    <?php // echo $form->field($model, 'fecha') ?>

    <?php // echo $form->field($model, 'usuario_id') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
