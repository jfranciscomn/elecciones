<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\web\JsExpression;
use kartik\widgets\Select2;
use kartik\popover\PopoverX;
use yii\bootstrap\Modal;
?>

<div class="incidente-form_persona">

    <?php $form = ActiveForm::begin(); ?>
        <?= $form->field($model2, 'persona_nombre')->textInput(['maxlength' => 145]) ?>
    	<?= $form->field($model2, 'sexo')->textInput(['maxlength' => 145]) ?>
    	<?= $form->field($model2, 'edad')->textInput(['maxlength' => 145]) ?>
    	<?= $form->field($model2, 'sexo')->textInput(['maxlength' => 145]) ?>    
    	<?= $form->field($model2, 'domicilio')->textInput(['maxlength' => 245]) ?>

    	<?= Html::submitbutton($model2->isNewRecord ? 'Agregar' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']);?>
    		
    <?php ActiveForm::end(); ?>

</div>
