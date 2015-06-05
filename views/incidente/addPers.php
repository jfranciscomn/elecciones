<?php


use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use yii\web\JsExpression;
use kartik\widgets\Select2;
use kartik\popover\PopoverX;
use yii\bootstrap\Modal;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\models\Persona */
/* @var $form yii\widgets\ActiveForm */
$this->title = 'Crear Incidente: Agregar Personas';
$this->params['breadcrumbs'][] = ['label' => 'Incidentes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

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
?>


<div class="persona-form">

    <?php $form = ActiveForm::begin(); ?>




    

    

    


    <div class="panel panel-primary" id='divdenunciante'>
        <div class="panel-heading">Persona</div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-6">
                        <?= $form->field($model, 'estado_persona_id')->widget(Select2::classname(),[
                                    
                                    'data' => $estados,
                                    
                                    'options' => ['placeholder' => 'Seleccionar estado de la persona ...',],
                                    'pluginOptions' => [
                                        'allowClear' => true,
                                    ],
                        ]);
                        ?>
                    </div>

                    <div class="col-md-6">
                        <?= $form->field($model, 'persona_nombre')->textInput(['maxlength' => 145]) ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <?= $form->field($model, 'edad')->textInput() ?>
                    </div>
                    <div class="col-md-6">
                        <?= $form->field($model, 'sexo')->widget(Select2::classname(),[
                                    
                                    'data' => ['1'=>'Masculino', '2'=>'Femenino'],
                                    
                                    'options' => ['placeholder' => 'Seleccionar sexo...',],
                                    'pluginOptions' => [
                                        'allowClear' => true,
                                    ],
                        ]);
                        ?>
                    </div>
                </div>
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
                                                                            $("#persona-municipio_id").val(data["municipio_id"]).trigger("change");
                                                                        }
                                                                })',],
                                    'pluginOptions' => [
                                        'allowClear' => true,
                                        'ajax' => [
                                            'url' => $urlPoblacion,
                                            'dataType' => 'json',
                                            'data' => new JsExpression('function(term,page) { return {search:term,municipio:$("#persona-municipio_id").val(),sindicatura:$("#persona-sindicatura_id").val()}; }'),
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
                                                                            $("#persona-poblacion_id").val(data["poblacion_id"]).trigger("change");
                                                                        }
                                                                })',],
                                    'pluginOptions' => [
                                        'allowClear' => true,
                                        'ajax' => [
                                            'url' => $urlColonia,
                                            'dataType' => 'json',
                                            'data' => new JsExpression('function(term,page) { return {search:term,municipio:$("#persona-municipio_id").val(),poblacion:$("#persona-poblacion_id").val(),sindicatura:$("#persona-sindicatura_id").val()}; }'),
                                            'results' => new JsExpression('function(data,page) { return {results:data.results}; }'),
                                        ],
                                        'initSelection' => new JsExpression($initScriptColonia),
                                    ],
                        ]) ?>
                        
                    </div>
                    <div class="col-md-6">                        
                         <?= $form->field($model, 'domicilio')->textArea() ?>
                    </div>
                </div>
                
                <div class="form-group">
                    
                    <?= Html::submitButton($model->isNewRecord ? 'Agregar' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
                </div>

            </div>

             
        </div>

   
    <?php ActiveForm::end(); ?>

</div>


        <div class="panel panel-primary" id='divdenunciante'>
                <div class="panel-heading">Personas Agregadas </div>
                <div class="panel-body">

                        <?= GridView::widget([
                        'dataProvider' => $dataProvider,
                        
                        'columns' => [
                            ['class' => 'yii\grid\SerialColumn'],

                            'estadoPersona.estado_persona_nombre',
                            'persona_nombre',
                            'sexo',
        

                            ['class' => 'yii\grid\ActionColumn', 'template'=>'{update}{delete}',
                                 'urlCreator' => function ($action, $model, $key, $index) {
                                        if ($action === 'delete') {
                                            return Url::to(['persona-delete','incidente_id'=>$model->incidente_id,'persona_id'=>$model->persona_id]);
                                        }
                                        if ($action === 'update') {
                                            return Url::to(['agregar-persona','incidente_id'=>$model->incidente_id,'persona_id'=>$model->persona_id]);
                                        }
                                    }
                            ],
                        ],
                    ]); ?>
                    
    
                </div>
        </div>

        <?php
           if($model->isNewRecord)
            echo Html::a($model->isNewRecord ?'Siguiente':'Finalizar',$model->isNewRecord ?[
                'agregar-vehiculo','incidente_id'=>$incidente_id]:['view','incidente_id'=>$incidente_id], ['class' =>'btn btn-success']) 
        ?>