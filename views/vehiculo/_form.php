<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\web\JsExpression;
use kartik\widgets\Select2;


/* @var $this yii\web\View */
/* @var $model app\models\Vehiculo */
/* @var $form yii\widgets\ActiveForm */
$url = \yii\helpers\Url::to(['gama-vehiculo/autocompletar']);
// Script to initialize the selection based on the value of the select2 element
$initScript = <<< SCRIPT
function (element, callback) {
    var id=\$(element).val();
    if (id !== "") {
        \$.ajax("{$url}?id=" + id, {
            dataType: "json"
        }).done(function(data) { callback(data.results);});
    }
}
SCRIPT;
?>

<div class="vehiculo-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <?= $form->field($model, 'marca_vehiculo_id')->widget(Select2::classname(),[
                                    'language' => 'es_MX',
                                    'data' => $marcaVehiculos,
                                    
                                    'options' => ['placeholder' => 'Seleccionar una marca ...',],
                                    'pluginOptions' => [
                                        'allowClear' => true,
                                    ],
                ]) ?>
            </div>

            <div class="col-md-6">
                <?= $form->field($model, 'gama_vehiculo_id')->widget(Select2::classname(),[                                                                    
                                    'options' => ['placeholder' => 'Seleccionar una gama ...',],
                                    'pluginOptions' => [
                                        'allowClear' => true,
                                        'ajax' => [
                                            'url' => $url,
                                            'dataType' => 'json',
                                            'data' => new JsExpression('function(term,page) { return {search:term,marca:$("#gamavehiculo-marca_vehiculo_id").val()}; }'),
                                            'results' => new JsExpression('function(data,page) { return {results:data.results}; }'),
                                        ],
                                        'initSelection' => new JsExpression($initScript),
                                    ],
                ]) ?>                
            </div>

        </div>
            <div class="row">
            <div class="col-md-6">
                <?= $form->field($model, 'incidente_id')->textInput() ?>

                <?= $form->field($model, 'estado_vehiculo_id')->textInput() ?>

                <?= $form->field($model, 'placas')->textInput(['maxlength' => 145]) ?>

                <?= $form->field($model, 'modelo')->textInput(['maxlength' => 145]) ?>

                <?= $form->field($model, 'numero_serie')->textInput(['maxlength' => 145]) ?>
            </div>
            </div>
    </div>



    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
