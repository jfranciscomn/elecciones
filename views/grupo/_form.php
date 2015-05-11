<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\Select2;

/* @var $this yii\web\View */
/* @var $model app\models\Grupo */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="grupo-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <?= $form->field($model, 'grupo_nombre')->textInput(['maxlength' => 145]) ?>
            </div>
            <div class="col-md-6">
                <?= $form->field($model, 'accionesActuales')->widget(Select2::classname(), [
                        'language' => 'es_MX',
                        'data' => $lista_accion,
                        
                        'options' => ['placeholder' => 'Seleccionar acciones ...','multiple' => true,],
                        'pluginOptions' => [
                            'allowClear' => true,
                            
                        ],
                    ]); ?>
            </div>
        </div>
    </div>

    

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Crear' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
