<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\web\JsExpression;
use kartik\widgets\Select2;

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
        <div class="panel-heading">General </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-6">
                        <?= $form->field($model, 'operativo_id')->widget(Select2::classname(),[
                                    
                                    'data' => $operativos,
                                    
                                    'options' => ['placeholder' => 'Seleccionar Operativo ...',],
                                    'pluginOptions' => [
                                        'allowClear' => true,
                                    ],
                        ]) ?>
                    </div>
                    <div class="col-md-6">
                        
                        <?= $form->field($model, 'clase_incidente_id')->widget(Select2::classname(),[
                                    
                                    'data' => $claseIncidente,
                                    
                                    'options' => ['placeholder' => 'Seleccionar Incidente ...',],
                                    'addon' => [
                   
                                    'append' => [
                                            'content' => Html::button(' <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>', [
                                                'class' => 'btn btn-default', 
                                                'title' => 'Mark on map', 
                                                'data-toggle' => 'tooltip'
                                            ]),
                                            'asButton' => true
                                        ]
                                    ],
                                    'pluginOptions' => [
                                        'allowClear' => true,
                                    ],

                        ]) ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        

                        <?= $form->field($model, 'subclase_incidente_id')->widget(Select2::classname(),[
                                    'options' => ['placeholder' => 'Seleccionar ...',],
                                    'pluginOptions' => [
                                        'allowClear' => true,
                                        'ajax' => [
                                            'url' => $urlSubclase,
                                            'dataType' => 'json',
                                            'data' => new JsExpression('function(term,page) { return {search:term,clase:$("#incidente-clase_incidente_id").val()}; }'),
                                            'results' => new JsExpression('function(data,page) { return {results:data.results}; }'),
                                        ],
                                        'initSelection' => new JsExpression($initScriptSublase),
                                    ],
                        ]) ?>
                    </div>
                    <div class="col-md-6">
                        
                        <?= $form->field($model, 'subclase2_incidente_id')->widget(Select2::classname(),[
                                    'options' => ['placeholder' => 'Seleccionar ...',],
                                    'pluginOptions' => [
                                        'allowClear' => true,
                                        'ajax' => [
                                            'url' => $urlSubclase2,
                                            'dataType' => 'json',
                                            'data' => new JsExpression('function(term,page) { return {search:term,clase:$("#incidente-clase_incidente_id").val(),subclase:$("#incidente-subclase_incidente_id").val()}; }'),
                                            'results' => new JsExpression('function(data,page) { return {results:data.results}; }'),
                                        ],
                                        'initSelection' => new JsExpression($initScriptSublase2),
                                    ],
                        ]) ?>
                    </div>
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
                        ]) ?>
                    </div>
                    <div class="col-md-6">
                        <?= $form->field($model, 'sindicatura_id')->widget(Select2::classname(),[
                                    
                                    
                                    'options' => ['placeholder' => 'Seleccionar una sindicatura ...',],
                                    'pluginOptions' => [
                                        'allowClear' => true,
                                        'ajax' => [
                                            'url' => $urlSindicatura,
                                            'dataType' => 'json',
                                            'data' => new JsExpression('function(term,page) { return {search:term,municipio:$("#incidente-municipio_id").val()}; }'),
                                            'results' => new JsExpression('function(data,page) { return {results:data.results}; }'),
                                        ],
                                        'initSelection' => new JsExpression($initScriptSindicatura),
                                    ],
                        ]) ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <?= $form->field($model, 'poblacion_id')->widget(Select2::classname(),[
                                    'options' => ['placeholder' => 'Seleccionar una poblacion ...',],
                                    'pluginOptions' => [
                                        'allowClear' => true,
                                        'ajax' => [
                                            'url' => $urlPoblacion,
                                            'dataType' => 'json',
                                            'data' => new JsExpression('function(term,page) { return {search:term,municipio:$("#incidente-municipio_id").val(),sindicatura:$("#incidente-sindicatura_id").val()}; }'),
                                            'results' => new JsExpression('function(data,page) { return {results:data.results}; }'),
                                        ],
                                        'initSelection' => new JsExpression($initScriptPoblacion),
                                    ],
                        ]) ?>
                        
                    </div>
                    <div class="col-md-6">
                        
                        <?= $form->field($model, 'colonia_id')->widget(Select2::classname(),[
                                    'options' => ['placeholder' => 'Seleccionar una colonia ...',],
                                    'pluginOptions' => [
                                        'allowClear' => true,
                                        'ajax' => [
                                            'url' => $urlColonia,
                                            'dataType' => 'json',
                                            'data' => new JsExpression('function(term,page) { return {search:term,municipio:$("#incidente-municipio_id").val(),poblacion:$("#incidente-poblacion_id").val(),sindicatura:$("#incidente-sindicatura_id").val()}; }'),
                                            'results' => new JsExpression('function(data,page) { return {results:data.results}; }'),
                                        ],
                                        'initSelection' => new JsExpression($initScriptColonia),
                                    ],
                        ]) ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <?= $form->field($model, 'lugar_id')->widget(Select2::classname(),[
                                    'options' => ['placeholder' => 'Seleccionar un lugar ...',],
                                    'pluginOptions' => [
                                        'allowClear' => true,
                                        
                                        'tag'=>true,
                                        'tokenSeparators'=>['?'],
                                        'ajax' => [
                                            'url' => $urlLugar,
                                            'dataType' => 'json',
                                            'data' => new JsExpression('function(term,page) { return {search:term,municipio:$("#incidente-municipio_id").val(),poblacion:$("#incidente-poblacion_id").val(),sindicatura:$("#incidente-sindicatura_id").val()}; }'),
                                            'results' => new JsExpression('function(data,page) { return {results:data.results}; }'),
                                        ],
                                        'initSelection' => new JsExpression($initScriptLugar),
                                    ],
                        ]) ?>
                        
                    </div>
                    <div class="col-md-6">
                        <?= $form->field($model, 'direccion')->textArea() ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    
    <div class="row">
        <div class="col-md-6">
            <div class="panel panel-primary" id='divdenunciante'>
                <div class="panel-heading">Personas</div>
                <div class="panel-body">
                </div>
                
            </div>
        </div>
        <div class="col-md-6">
            <div class="panel panel-primary" id='divdenunciante'>
                <div class="panel-heading">Vehiculos</div>
                <div class="panel-body">
                </div>
            </div>
        </div>
    </div>
    

    

    

    


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
