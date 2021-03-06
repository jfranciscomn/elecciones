<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\web\JsExpression;
use kartik\widgets\Select2;

/* @var $this yii\web\View */
/* @var $model app\models\Poblacion */
/* @var $form yii\widgets\ActiveForm */
$url = \yii\helpers\Url::to(['sindicatura/autocompletar']);
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

<div class="poblacion-form">

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
            	<?= $form->field($model, 'poblacion_nombre')->textInput(['maxlength' => 145]) ?>
            </div>
        </div>
    </div>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Crear' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
