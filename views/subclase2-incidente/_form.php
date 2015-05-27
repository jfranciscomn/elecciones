<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\web\JsExpression;
use kartik\widgets\Select2;

/* @var $this yii\web\View */
/* @var $model app\models\Subclase2Incidente */
/* @var $form yii\widgets\ActiveForm */
$url = \yii\helpers\Url::to(['subclase-incidente/autocompletar']);
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

<div class="subclase2-incidente-form">
    <?php $form = ActiveForm::begin(); ?>
    <div class="container-fluid">
    	<div class="row">
            <div class="col-md-6">
			    <?= $form->field($model, 'clase_incidente_id')->widget(Select2::classname(),[			    					
			                        'data' => $claseIncidentes,			                       
			                        'options' => ['placeholder' => 'Seleccionar un incidente ...',],
			                        'pluginOptions' => [
			                            'allowClear' => true,
			                        ],
			    ]) ?>	

			    <?= $form->field($model, 'subclase2_incidente_nombre')->textInput(['maxlength' => 145]) ?>

				<div class="form-group">
        			<?= Html::submitButton($model->isNewRecord ? 'Crear' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    			</div>		   
			</div>

			<div class="col-md-6">
				<?= $form->field($model, 'subclase_incidente_id')->widget(Select2::classname(),[			    								                      
			                        'options' => ['placeholder' => 'Seleccionar una subclase ...',],
			                        'pluginOptions' => [
			                            'allowClear' => true,
			                            'ajax' => [
			                            	'url' => $url,
			                            	'dataType' => 'json',
			                            	'data' => new JsExpression('function(term,page) { return {search:term,claseincidente:$("#subclase2incidente-clase_incidente_id").val()}; }'),
			                            	'results' => new JsExpression('function(data,page) { return {results:data.results}; }'),
			                            ],
			                            'initSelection' => new JsExpression($initScript),
			                        ],
			    ]) ?>
    			
    		</div>

		</div>

		
    </div>
    <?php ActiveForm::end(); ?>

</div>
