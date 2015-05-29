<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\web\JsExpression;
use kartik\widgets\Select2;
use kartik\popover\PopoverX;
use yii\bootstrap\Modal;
?>

<div class="incidente-form_corporacion">

    <?php $form = ActiveForm::begin(); ?>
        <?= $form->field($model4, 'corporacion_nombre')->textInput(['maxlength' => 145]) ?>
    <?php ActiveForm::end(); ?>

</div>