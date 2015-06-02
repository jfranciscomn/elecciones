<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\MarcaVehiculo */

$this->title = 'Actualizar Marca: ' . ' ' . $model->marca_vehiculoco_nombre;
$this->params['breadcrumbs'][] = ['label' => 'Marca de Vehiculo', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->marca_vehiculoco_nombre, 'url' => ['view', 'id' => $model->marca_vehiculo_id]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="marca-vehiculo-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
