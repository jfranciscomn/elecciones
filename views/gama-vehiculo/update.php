<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\GamaVehiculo */

$this->title = 'Update Gama Vehiculo: ' . ' ' . $model->gama_vehiculo_id;
$this->params['breadcrumbs'][] = ['label' => 'Gama Vehiculos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->gama_vehiculo_id, 'url' => ['view', 'id' => $model->gama_vehiculo_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="gama-vehiculo-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
                'marcaVehiculos' => $marcaVehiculos,
    ]) ?>

</div>
