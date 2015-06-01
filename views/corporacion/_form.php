<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Corporacion */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="corporacion-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'corporacion_nombre')->textInput(['maxlength' => 145]) ?>

    <?= $form->field($model, 'tipo_corporacion_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
