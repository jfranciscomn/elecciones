<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Incidente */

$this->title = 'Crear Incidente';
$this->params['breadcrumbs'][] = ['label' => 'Incidentes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="incidente-create">    
	<p class="pull-left">
        <?= Html::a('Cancelar', \yii\helpers\Url::to('index'), ['class' => 'colorido']) ?>
    </p>
    <div class="clearfix"></div>

    <?= $this->render('_form', [
        'model' => $model,
        'model2' => $model2,      
        'model3' => $model3,
        'model4' => $model4,
        'municipios'=>$municipios,
        'operativos'=>$operativos,
        'claseIncidente'=>$claseIncidente,
    ]); ?>

</div>
