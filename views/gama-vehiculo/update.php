<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\GamaVehiculo */

$this->title = 'Actualizar Gama: ' . ' ' . $model->gama_vehiculo_nombre;
$this->params['breadcrumbs'][] = ['label' => 'Gama de Vehiculo', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->gama_vehiculo_nombre, 'url' => ['view', 'id' => $model->gama_vehiculo_id]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="gama-vehiculo-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
                'marcaVehiculos' => $marcaVehiculos,
    ]) ?>

</div>
