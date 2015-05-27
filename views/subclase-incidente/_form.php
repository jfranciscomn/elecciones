<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\web\JsExpression;
use kartik\widgets\Select2;

/* @var $this yii\web\View */
/* @var $model app\models\SubclaseIncidente */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="subclase-incidente-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="container-fluid">

    	<div class="row">
            <div class="col-md-6">
			    <?= $form->field($model, 'clase_incidente_id')->widget(Select2::classname(),[
			    					
			                        'data' => $claseIncidentes,
			                        
			                        'options' => ['placeholder' => 'Selecciona un incidente ...',],
			                        'pluginOptions' => [
			                            'allowClear' => true,
			                        ],
			    ]) ?>
			    <?= $form->field($model, 'subclase_incidente_nombre')->textInput(['maxlength' => 145]) ?>
			    <div class="form-group">
        			<?= Html::submitButton($model->isNewRecord ? 'Crear' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    			</div>
			</div>
		</div>
    </div>

    

    

    <?php ActiveForm::end(); ?>

</div>
