<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\MarcaVehiculo */

$this->title = 'Update Marca Vehiculo: ' . ' ' . $model->marca_vehiculo_id;
$this->params['breadcrumbs'][] = ['label' => 'Marca Vehiculos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->marca_vehiculo_id, 'url' => ['view', 'id' => $model->marca_vehiculo_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="marca-vehiculo-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
