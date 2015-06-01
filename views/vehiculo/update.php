<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Vehiculo */

$this->title = 'Update Vehiculo: ' . ' ' . $model->vehiculo_id;
$this->params['breadcrumbs'][] = ['label' => 'Vehiculos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->vehiculo_id, 'url' => ['view', 'id' => $model->vehiculo_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="vehiculo-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
                'marcaVehiculos'=> $marcaVehiculos,
    ]) ?>

</div>
