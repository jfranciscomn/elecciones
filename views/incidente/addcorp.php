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

$this->title = 'Crear Incidente: Agregar Corporaciones';
$this->params['breadcrumbs'][] = ['label' => 'Incidentes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

    
    <div class="incidente-form">

	    <?php $form = ActiveForm::begin(); ?>

	    <div class="panel panel-primary" id='divdenunciante'>
	        	<div class="panel-heading">Corporaciones </div>
	        	<div class="panel-body">
	                <div class="row">
	                    <div class="col-md-12">
	                        <?= $form->field($model, 'corporacion_id')->widget(Select2::classname(),[
	                                    
	                                    'data' => $corporaciones,
	                                    
	                                    'options' => ['placeholder' => 'Seleccionar Corporacion ...',],
	                                    'pluginOptions' => [
	                                        'allowClear' => true,
	                                    ],
	                        ]) ?>
	                    </div>
	                </div>
	                <div class="form-group">
			        	<?= Html::submitButton($model->isNewRecord ? 'Agregar' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
			    	</div>
	            </div>
	            
	    </div>

		

    	<?php ActiveForm::end(); ?>

    	<div class="panel panel-primary" id='divdenunciante'>
	        	<div class="panel-heading">Corporaciones Agregadas </div>
	        	<div class="panel-body">

	                	<?= GridView::widget([
				        'dataProvider' => $dataProvider,
				        
				        'columns' => [
				            ['class' => 'yii\grid\SerialColumn'],

				            'corporacion.corporacion_nombre',
		

				            ['class' => 'yii\grid\ActionColumn', 'template'=>'{delete}',
				            	 'urlCreator' => function ($action, $model, $key, $index) {
							            if ($action === 'delete') {
							                return Url::to(['corporacion-delete','incidente_id'=>$model->incidente_id,'corporacion_id'=>$model->corporacion_id]);
							            }
							        }
				            ],
				        ],
				    ]); ?>
	                
    
				</div>
		</div>

		<?php
			if(isset($bandera))
				echo Html::a('Finalizar',['view','incidente_id'=>$incidente_id], ['class' =>'btn btn-success']) ;
			else
				echo Html::a('Siguiente',['agregar-persona','incidente_id'=>$incidente_id], ['class' =>'btn btn-success']) ;
		?>