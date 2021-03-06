<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\search\Subclase2IncidenteSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="subclase2-incidente-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'subclase2_incidente_id') ?>

    <?= $form->field($model, 'subclase_incidente_id') ?>

    <?= $form->field($model, 'clase_incidente_id') ?>

    <?= $form->field($model, 'subclase2_incidente_nombre') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
