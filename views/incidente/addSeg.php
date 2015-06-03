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

$this->title = 'Crear Incidente: Seguimiento';
$this->params['breadcrumbs'][] = ['label' => 'Incidentes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

    
    <div class="incidente-form">

	    <?php $form = ActiveForm::begin(); ?>

	    <div class="panel panel-primary" id='divdenunciante'>
	        	<div class="panel-heading">Seguimiento </div>
	        	<div class="panel-body">
	                <div class="row">
	                    <div class="col-md-6">
	                        <?= $form->field($model, 'corporacion_id')->widget(Select2::classname(),[
	                                    
	                                    'data' => $corporaciones,
	                                    
	                                    'options' => ['placeholder' => 'Seleccionar Corporacion ...',],
	                                    'pluginOptions' => [
	                                        'allowClear' => true,
	                                    ],
	                        ]) ?>
	                    </div>
	                    <div class="col-md-6">
		                    <?= $form->field($model, 'descripcion')->textArea() ?>
		                </div>
	                </div>
	                <div class="form-group">
			        	<?= Html::submitButton('Siguiente', ['class' =>  'btn btn-success']) ?>
			    	</div>
	            </div>
	            
	    </div>

		

    	<?php ActiveForm::end(); ?>
