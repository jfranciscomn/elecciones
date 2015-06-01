<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\EstadoVehiculo */

$this->title = 'Update Estado Vehiculo: ' . ' ' . $model->estado_vehiculo_id;
$this->params['breadcrumbs'][] = ['label' => 'Estado Vehiculos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->estado_vehiculo_id, 'url' => ['view', 'id' => $model->estado_vehiculo_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="estado-vehiculo-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
