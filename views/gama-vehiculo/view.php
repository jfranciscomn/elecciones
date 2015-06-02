<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\GamaVehiculo */

$this->title = $model->gama_vehiculo_nombre;
$this->params['breadcrumbs'][] = ['label' => 'Gama de Vehiculos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="gama-vehiculo-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Actualizar', ['update', 'id' => $model->gama_vehiculo_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Eliminar', ['delete', 'id' => $model->gama_vehiculo_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => '¿Seguro que quieres eliminar este objeto?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'gama_vehiculo_id',
            //'marcaVehiculo.marca_vehiculoco_nombre',
            'marcaName',
            'gama_vehiculo_nombre',
        ],
    ]) ?>

</div>
