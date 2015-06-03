<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\search\LugarSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="lugar-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'lugar_id') ?>

    <?= $form->field($model, 'tipo_lugar_id') ?>

    <?= $form->field($model, 'poblacion_id') ?>

    <?= $form->field($model, 'municipio_id') ?>

    <?php // echo $form->field($model, 'lugar_nombre') ?>

    <?php // echo $form->field($model, 'colonia_id') ?>

    <?php // echo $form->field($model, 'direccion') ?>

    <div class="form-group">
        <?= Html::submitButton('Buscar', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
