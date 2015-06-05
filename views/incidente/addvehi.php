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
/* @var $model app\models\Incidente */

$this->title = 'Crear Incidente: Agregar Vechiculo';
$this->params['breadcrumbs'][] = ['label' => 'Incidentes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

$urlGama = \yii\helpers\Url::to(['gama-vehiculo/autocompletar']);
$initScriptGama = <<< SCRIPT
function (element, callback) {
    var id=\$(element).val();
    if (id !== "") {
        \$.ajax("{$urlGama}?id=" + id, {
            dataType: "json"
        }).done(function(data) { callback(data.results);});
    }
}
SCRIPT;
?>

    
    <div class="incidente-form">

	    <?php $form = ActiveForm::begin(); ?>

	    <div class="panel panel-primary" id='divdenunciante'>
	        	<div class="panel-heading">Vehiculo </div>
	        	<div class="panel-body">
	                <div class="row">
	                    <div class="col-md-6">
	                        <?= $form->field($model, 'estado_vehiculo_id')->widget(Select2::classname(),[
	                                    
	                                    'data' => $estados,
	                                    
	                                    'options' => ['placeholder' => 'Seleccionar Estado del vehiculo ...',],
	                                    'pluginOptions' => [
	                                        'allowClear' => true,
	                                    ],
	                        ]) ?>
	                    </div>
	                    <div class="col-md-6">
	                        <?= $form->field($model, 'marca_vehiculo_id')->widget(Select2::classname(),[
	                                    
	                                    'data' => $marcas,
	                                    
	                                    'options' => ['placeholder' => 'Seleccionar Marca ...',],
	                                    'pluginOptions' => [
	                                        'allowClear' => true,
	                                    ],
	                        ]) ?>
	                    </div>
	                </div>
	                <div class="row">
	                    <div class="col-md-6">
	                    	<?= $form->field($model, 'gama_vehiculo_id')->widget(Select2::classname(),[                                                                    
                                    'options' => ['placeholder' => 'Seleccionar una gama de vehiculo ...',],
                                    'pluginOptions' => [
                                        'allowClear' => true,
                                        'ajax' => [
                                            'url' => $urlGama,
                                            'dataType' => 'json',
                                            'data' => new JsExpression('function(term,page) { return {search:term,marca:$("#vehiculo-marca_vehiculo_id").val()}; }'),
                                            'results' => new JsExpression('function(data,page) { return {results:data.results}; }'),
                                        ],
                                        'initSelection' => new JsExpression($initScriptGama),
                                    ],
                        	]) ?>
	                    </div>
	                    <div class="col-md-6">
	                    	<?= $form->field($model, 'modelo')->textInput(['maxlength' => 145]) ?>
	                    </div>
	                </div>
	                <div class="row">
	                    <div class="col-md-6">
	                        <?= $form->field($model, 'placas')->textInput(['maxlength' => 145]) ?>
	                    </div>
	                    <div class="col-md-6">
	                    	<?= $form->field($model, 'numero_serie')->textInput(['maxlength' => 145]) ?>
	                    </div>
	                </div>
	                <div class="form-group">
			        	<?= Html::submitButton($model->isNewRecord ? 'Agregar' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
			    	</div>
	            </div>
	            
	    </div>

		

    	<?php ActiveForm::end(); ?>


 		<div class="panel panel-primary" id='divdenunciante'>
                <div class="panel-heading">Vehiculos Agregados </div>
                <div class="panel-body">

                        <?= GridView::widget([
                        'dataProvider' => $dataProvider,
                        
                        'columns' => [
                            ['class' => 'yii\grid\SerialColumn'],

                            'estadoVehiculo.estado_vehiculo_nombre',
                            'marcaVehiculo.marca_vehiculoco_nombre',
                            'gamaVehiculo.gama_vehiculo_nombre',
                            'placas',
                            
                            
        

                            ['class' => 'yii\grid\ActionColumn', 'template'=>'{update}{delete}',
                                 'urlCreator' => function ($action, $model, $key, $index) {
                                        if ($action === 'delete') {
                                            return Url::to(['vehiculo-delete','vehiculo_id'=>$model->vehiculo_id]);
                                        }
                                        if ($action === 'update') {
                                            return Url::to(['agregar-vehiculo','incidente_id'=>$model->incidente_id,'vehiculo_id'=>$model->vehiculo_id]);
                                        }
                                    }
                            ],
                        ],
                    ]); ?>
                    
    
                </div>
        </div>

        <?=Html::a('Finalizar',['view','incidente_id'=>$incidente_id], ['class' =>'btn btn-success'])?>