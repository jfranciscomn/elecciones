<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\SubclaseIncidente */

$this->title = $model->subclase_incidente_nombre;
$this->params['breadcrumbs'][] = ['label' => 'Detalle de Incidente', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="subclase-incidente-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Actualizar', ['update', 'id' => $model->subclase_incidente_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Eliminar', ['delete', 'id' => $model->subclase_incidente_id], [
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
            'subclase_incidente_id',
            //'clase_incidente_id',
            'claseName',
            'subclase_incidente_nombre',
        ],
    ]) ?>

</div>
