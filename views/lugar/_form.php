<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use yii\web\JsExpression;
use kartik\widgets\Select2;
use kartik\widgets\DepDrop;
use app\models\Colonia;
use app\models\poblacion;



/* @var $this yii\web\View */
/* @var $model app\models\Lugar */
/* @var $form yii\widgets\ActiveForm */
$url = \yii\helpers\Url::to(['sindicatura/autocompletar']);
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

$urlPoblacion = \yii\helpers\Url::to(['poblacion/autocompletar']);
// Script to initialize the selection based on the value of the select2 element
$initScriptPoblacion = <<< SCRIPT
function (element, callback) {
    var id=\$(element).val();
    if (id !== "") {
        \$.ajax("{$urlPoblacion}?id=" + id, {
            dataType: "json"
        }).done(function(data) { callback(data.results);});
    }
}
SCRIPT;

$urlColonia = \yii\helpers\Url::to(['colonia/autocompletar']);
// Script to initialize the selection based on the value of the select2 element
$initScriptColonia = <<< SCRIPT
function (element, callback) {
    var id=\$(element).val();
    if (id !== "") {
        \$.ajax("{$urlColonia}?id=" + id, {
            dataType: "json"
        }).done(function(data) { callback(data.results);});
    }
}
SCRIPT;
?>



<div class="lugar-form">
    <?php $form = ActiveForm::begin(); ?>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <?= $form->field($model, 'municipio_id')->widget(Select2::classname(),[
                                    
                                    'data' => $municipios,
                                    
                                    'options' => ['placeholder' => 'Seleccionar municipio ...',],
                                    'pluginOptions' => [
                                        'allowClear' => true,
                                    ],
                        ]) ?>
                    </div>   

                    <div class="col-md-6">                        
                        <?= $form->field($model, 'poblacion_id')->widget(Select2::classname(),[
                                'options' => ['id'=>'poblaciones' ,'placeholder' => 'Seleccionar una poblacion ...',
                                              'onchange' => '$.ajax({
                                                                        url: "'.Url::to(['poblacion/datos-poblacion']).'",
                                                                        context: document.body,
                                                                        data: {id: this.value},
                                                                        success: function(data){
                                                                            $("#lugar-municipio_id").val(data["municipio_id"]).trigger("change");
                                                                        }
                                                                })',],
                                'pluginOptions' => [
                                    'allowClear' => true,
                                    'ajax' => [
                                                'url' => $urlPoblacion,
                                                'dataType' => 'json',
                                                'data' => new JsExpression('function(term,page) { return {search:term,municipio:$("#lugar-municipio_id").val()}; }'),
                                                'results' => new JsExpression('function(data,page) { return {results:data.results}; }'),                        
                                    ],
                                            'initSelection' => new JsExpression($initScriptPoblacion),
                                ],
                            ])?>
                    </div>  
                </div>

                <div class="row">                    
                    <div class="col-md-6">
                        <?=$form->field($model, 'colonia_id')->widget(Select2::classname(),[
                            'options' => ['placeholder' => 'Seleccionar una colonia ...',
                                              'onchange' => '$.ajax({
                                                                        url: "'.Url::to(['colonia/datos-colonia']).'",
                                                                        context: document.body,
                                                                        data: {id: this.value},
                                                                        success: function(data){
                                                                            $("#poblacion").val(data["poblacion_id"]).trigger("change");
                                                                        }
                                                                })',],
                                    'pluginOptions' => [
                                        'allowClear' => true,
                                        'ajax' => [
                                            'url' => $urlColonia,
                                            'dataType' => 'json',
                                            'data' => new JsExpression('function(term,page) { return {search:term,municipio:$("#lugar-municipio_id").val(), poblacion:$("#lugar-poblacion_id").val()}; }'),
                                            'results' => new JsExpression('function(data,page) { return {results:data.results}; }'),
                                            
                                        ],
                                        'initSelection' => new JsExpression($initScriptColonia),
                                    ],
                            ])
                        ?>
                    </div>
                    <div class="col-md-6">
                        <?= $form->field($model, 'tipo_lugar_id')->widget(Select2::classname(),[
                                    
                                    'data' => $tipos,
                                    
                                    'options' => ['placeholder' => 'Seleccionar un tipo de lugar ...',],
                                    'pluginOptions' => [
                                        'allowClear' => true,
                                    ],
                        ]) ?>                        
                    </div> 
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <?= $form->field($model, 'lugar_nombre')->textInput(['maxlength' => 256]) ?>
                        <div class="form-group">
                            <?= Html::submitButton($model->isNewRecord ? 'Crear' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <?= $form->field($model, 'direccion')->textInput(['maxlength' => 256]) ?>
                    </div>
                </div>
                 
            </div>


    

    

    <?php ActiveForm::end(); ?>



</div>
