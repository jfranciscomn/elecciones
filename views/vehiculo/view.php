<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Vehiculo */

$this->title = $model->vehiculo_id;
$this->params['breadcrumbs'][] = ['label' => 'Vehiculos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="vehiculo-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->vehiculo_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->vehiculo_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'vehiculo_id',
            'incidente_id',
            'estado_vehiculo_id',
            'gama_vehiculo_id',
            'marca_vehiculo_id',
            'placas',
            'modelo',
            'numero_serie',
        ],
    ]) ?>

</div>
