<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\Select2;
use app\models\Grupo;
/* @var $this yii\web\View */
/* @var $model app\models\Usuario */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="usuario-form">

    <?php $form = ActiveForm::begin(); ?>

   
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <?= $form->field($model, 'usuario_nombre')->textInput(['maxlength' => 145]) ?>
            </div>
            <div class="col-md-6">
                <?= $form->field($model, 'password')->passwordInput(['maxlength' => 145]) ?>
            </div>
        </div>
        <div class="row">
            
            <div class="col-md-6">
                 <?= $form->field($model, 'correo')->textInput(['maxlength' => 145]) ?>
            </div>
            <div class="col-md-6">
                <?= $form->field($model, 'gruposActuales')->widget(Select2::classname(), [
                        'language' => 'es_MX',
                        'data' => $lista_grupo,
                        
                        'options' => ['placeholder' => 'Seleccione los grupos ...','multiple' => true,],
                        'pluginOptions' => [
                            'allowClear' => true,
                            
                        ],
                    ]); ?>
            </div>
        </div>
        <div class="row">
            
            
            <div class="col-md-6">
                <?= $form->field($model, 'superuser')->checkBox() ?>
            </div>
            <div class="col-md-6">
                <?= $form->field($model, 'activo')->checkBox() ?>
            </div>
        </div>
    </div>
    <br/>
    


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Crear' : 'Guardar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

