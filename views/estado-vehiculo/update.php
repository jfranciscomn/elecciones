<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\EstadoVehiculo */

$this->title = 'Actualizar Estado: ' . ' ' . $model->estado_vehiculo_nombre;
$this->params['breadcrumbs'][] = ['label' => 'Estado del Vehiculo', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->estado_vehiculo_nombre, 'url' => ['view', 'id' => $model->estado_vehiculo_id]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="estado-vehiculo-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
