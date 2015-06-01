<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\MarcaVehiculo */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="marca-vehiculo-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'marca_vehiculoco_nombre')->textInput(['maxlength' => 145]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
