<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\EstadoVehiculo */

$this->title = $model->estado_vehiculo_nombre;
$this->params['breadcrumbs'][] = ['label' => 'Estado del Vehiculo', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="estado-vehiculo-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Actualizar', ['update', 'id' => $model->estado_vehiculo_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Eliminar', ['delete', 'id' => $model->estado_vehiculo_id], [
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
            'estado_vehiculo_id',
            'estado_vehiculo_nombre',
        ],
    ]) ?>

</div>
