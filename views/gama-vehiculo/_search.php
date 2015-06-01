<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\search\GamaVehiculoSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="gama-vehiculo-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'gama_vehiculo_id') ?>

    <?= $form->field($model, 'marca_vehiculo_id') ?>

    <?= $form->field($model, 'gama_vehiculo_nombre') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
