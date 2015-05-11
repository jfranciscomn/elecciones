<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\search\BitacoraSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="bitacora-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'bitacora_id') ?>

    <?= $form->field($model, 'fecha') ?>

    <?= $form->field($model, 'usuario_id') ?>

    <?= $form->field($model, 'accion_id') ?>

    <?= $form->field($model, 'datos_enviados') ?>

    <?php // echo $form->field($model, 'HTTP_USER_AGENT') ?>

    <?php // echo $form->field($model, 'HTTP_HOST') ?>

    <?php // echo $form->field($model, 'SERVER_PORT') ?>

    <?php // echo $form->field($model, 'REMOTE_ADDR') ?>

    <?php // echo $form->field($model, 'REMOTE_PORT') ?>

    <?php // echo $form->field($model, 'SERVER_PROTOCOL') ?>

    <?php // echo $form->field($model, 'REQUEST_METHOD') ?>

    <?php // echo $form->field($model, 'REQUEST_URI') ?>

    <?php // echo $form->field($model, 'resultado') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
