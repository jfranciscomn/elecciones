<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\Select2;

/* @var $this yii\web\View */
/* @var $model app\models\Sindicatura */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="sindicatura-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
			    <?= $form->field($model, 'municipio_id')->widget(Select2::classname(),[
			    					'language' => 'es_MX',
			                        'data' => $municipios,
			                        
			                        'options' => ['placeholder' => 'Seleccionar municipio ...',],
			                        'pluginOptions' => [
			                            'allowClear' => true,
			                        ],
			    ]) ?>
			</div>
			<div class="col-md-6">
    			<?= $form->field($model, 'sindicatura_nombre')->textInput(['maxlength' => 145]) ?>
    		</div>
    	</div>
    </div>



    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
