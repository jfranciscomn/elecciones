<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\web\JsExpression;
use kartik\widgets\Select2;
use kartik\popover\PopoverX;
use yii\bootstrap\Modal;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\Incidente */
/* @var $form yii\widgets\ActiveForm */
$urlSindicatura = \yii\helpers\Url::to(['sindicatura/autocompletar']);
$initScriptSindicatura = <<< SCRIPT
function (element, callback) {
    var id=\$(element).val();
    if (id !== "") {
        \$.ajax("{$urlSindicatura}?id=" + id, {
            dataType: "json"
        }).done(function(data) { callback(data.results);});
    }
}
SCRIPT;

$urlPoblacion = \yii\helpers\Url::to(['poblacion/autocompletar']);
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

$urlLugar = \yii\helpers\Url::to(['lugar/autocompletar']);
$initScriptLugar = <<< SCRIPT
function (element, callback) {
    var id=\$(element).val();
    if (id !== "") {
        \$.ajax("{$urlLugar}?id=" + id, {
            dataType: "json"
        }).done(function(data) { callback(data.results);});
    }
}
SCRIPT;

$urlSubclase = \yii\helpers\Url::to(['subclase-incidente/autocompletar']);
$initScriptSublase = <<< SCRIPT
function (element, callback) {
    var id=\$(element).val();
    if (id !== "") {
        \$.ajax("{$urlSubclase}?id=" + id, {
            dataType: "json"
        }).done(function(data) { callback(data.results);});
    }
}
SCRIPT;

$urlSubclase2 = \yii\helpers\Url::to(['subclase2-incidente/autocompletar']);
$initScriptSublase2 = <<< SCRIPT
function (element, callback) {
    var id=\$(element).val();
    if (id !== "") {
        \$.ajax("{$urlSubclase2}?id=" + id, {
            dataType: "json"
        }).done(function(data) { callback(data.results);});
    }
}
SCRIPT;


?>



<div class="incidente-form">
    <?php $form = ActiveForm::begin(); ?>
    <div class="panel panel-primary" id='divdenunciante'>
        <div class="panel-heading">
            General 
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-md-6">                        
                    <?= $form->field($model, 'clase_incidente_id')->widget(Select2::classname(),[                                
                        'data' => $claseIncidente,
                        'options' => ['placeholder' => 'Seleccionar Incidente ...',],                                
                                        'pluginOptions' => [
                                        'allowClear' => true,
                        ],
                    ]) ?>
                </div>
                <div class="col-md-6">
                    <?= $form->field($model, 'subclase_incidente_id')->widget(Select2::classname(),[
                        'options' => ['placeholder' => 'Seleccionar ...',],
                        'pluginOptions' => [
                        'allowClear' => true,
                        'ajax' => [
                                    'url' => $urlSubclase,
                                    'dataType' => 'json',
                                    'data' => new JsExpression('function(term,page) { return {search:term,claseincidente:$("#incidente-clase_incidente_id").val()}; }'),
                                    'results' => new JsExpression('function(data,page) { return {results:data.results}; }'),
                                    ],
                                    'initSelection' => new JsExpression($initScriptSublase),
                                ],
                    ]) 

                    ?>                
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    
                               <?=$form->field($model,'operativo_id')->label(false)->hiddenInput(['value'=>'1']);?>

                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <?= $form->field($model, 'descripcion')->textArea() ?>
                </div>
            </div>
        </div>
    </div>


    <div class="panel panel-primary" id='divdenunciante'>
        <div class="panel-heading">Ubicacion</div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-6">
                        <?= $form->field($model, 'municipio_id')->widget(Select2::classname(),[                                    
                                    'data' => $municipios,                                    
                                    'options' => ['placeholder' => 'Seleccionar municipio ...',],
                                    'pluginOptions' => [
                                        'allowClear' => true,
                                    ],
                        ]);        
                        ?>
                    </div>
             

                    <div class="col-md-6">
                        <?= $form->field($model, 'poblacion_id')->widget(Select2::classname(),[
                                    'options' => ['placeholder' => 'Seleccionar una poblacion ...',
                                              'onchange' => '$.ajax({
                                                                        url: "'.Url::to(['poblacion/datos-poblacion']).'",
                                                                        context: document.body,
                                                                        data: {id: this.value},
                                                                        success: function(data){
                                                                            $("#incidente-municipio_id").val(data["municipio_id"]).trigger("change");
                                                                        }
                                                                })',],
                                    'pluginOptions' => [
                                        'allowClear' => true,
                                        'ajax' => [
                                            'url' => $urlPoblacion,
                                            'dataType' => 'json',
                                            'data' => new JsExpression('function(term,page) { return {search:term,municipio:$("#incidente-municipio_id").val()}; }'),
                                            'results' => new JsExpression('function(data,page) { return {results:data.results}; }'),
                                        ],
                                        'initSelection' => new JsExpression($initScriptPoblacion),
                                    ],
                        ]) ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        
                        <?= $form->field($model, 'colonia_id')->widget(Select2::classname(),[
                                    'options' => ['placeholder' => 'Seleccionar una colonia ...',
                                              'onchange' => '$.ajax({
                                                                        url: "'.Url::to(['colonia/datos-colonia']).'",
                                                                        context: document.body,
                                                                        data: {id: this.value},
                                                                        success: function(data){
                                                                            $("#incidente-poblacion_id").val(data["poblacion_id"]).trigger("change");
                                                                        }
                                                                })',],
                                    'pluginOptions' => [
                                        'allowClear' => true,
                                        'ajax' => [
                                            'url' => $urlColonia,
                                            'dataType' => 'json',
                                            'data' => new JsExpression('function(term,page) { return {search:term,municipio:$("#incidente-municipio_id").val(),poblacion:$("#incidente-poblacion_id").val()}; }'),
                                            'results' => new JsExpression('function(data,page) { return {results:data.results}; }'),
                                        ],
                                        'initSelection' => new JsExpression($initScriptColonia),
                                    ],
                        ]) ?>
                    </div>
                    <div class="col-md-6">                        
                        <?= $form->field($model, 'lugar_id')->widget(Select2::classname(),[
                                    'options' => ['placeholder' => 'Seleccionar un lugar ...',
                                              'onchange' => '$.ajax({
                                                                        url: "'.Url::to(['lugar/datos-lugar']).'",
                                                                        context: document.body,
                                                                        data: {id: this.value},
                                                                        success: function(data){
                                                                            $("#incidente-colonia_id").val(data["colonia_id"]).trigger("change");
                                                                            $("#incidente-distrito_id").val(data["distrito"]).trigger("change");

                                                                        }
                                                                })',],
                                    'pluginOptions' => [
                                        'allowClear' => true,                                        
                                        'tag'=>true,
                                        'tokenSeparators'=>['?'],
                                        'ajax' => [
                                            'url' => $urlLugar,
                                            'dataType' => 'json',
                                            'data' => new JsExpression('function(term,page) { return {search:term,municipio:$("#incidente-municipio_id").val(),poblacion:$("#incidente-poblacion_id").val()}; }'),
                                            'results' => new JsExpression('function(data,page) { return {results:data.results}; }'),
                                        ],
                                        'initSelection' => new JsExpression($initScriptLugar),
                                    ],
                        ]) ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <?= $form->field($model, 'distrito_id')->widget(Select2::classname(),[                                
                            'data' => $distritos,
                            'options' => ['placeholder' => 'Seleccionar Distrito ...',],                                
                                            'pluginOptions' => [
                                            'allowClear' => true,
                            ],
                        ]) ?>   
                    </div>
                    <div class="col-md-6">
                        <?= $form->field($model, 'direccion')->textArea() ?>
                    </div>
                </div>
            </div>
        </div>


    

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Siguiente' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
