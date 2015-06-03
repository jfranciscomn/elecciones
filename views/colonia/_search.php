<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\search\ColoniaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="colonia-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'colonia_id') ?>

    <?= $form->field($model, 'poblacion_id') ?>

    <?= $form->field($model, 'municipio_id') ?>

    <?= $form->field($model, 'colonia_nombre') ?>

    <div class="form-group">
        <?= Html::submitButton('Buscar', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
