<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\web\JsExpression;
use kartik\widgets\Select2;
use kartik\popover\PopoverX;
use yii\bootstrap\Modal;
?>

<div class="incidente-form_vehiculo">

    <?php $form = ActiveForm::begin(); ?>
        <?= $form->field($model3, 'placas')->textInput(['maxlength' => 145]) ?>
    	<?= $form->field($model3, 'modelo')->textInput(['maxlength' => 145]) ?>
    	<?= $form->field($model3, 'numero_serie')->textInput(['maxlength' => 145]) ?>
    <?php ActiveForm::end(); ?>

</div>