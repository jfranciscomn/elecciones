<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\TipoCorporacion */

$this->title = $model->tipo_corporacion_nombre;
$this->params['breadcrumbs'][] = ['label' => 'Tipo de Corporacion', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tipo-corporacion-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Actualizar', ['update', 'id' => $model->tipo_corporacion_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Eliminar', ['delete', 'id' => $model->tipo_corporacion_id], [
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
            'tipo_corporacion_id',
            'tipo_corporacion_nombre',
        ],
    ]) ?>

</div>
