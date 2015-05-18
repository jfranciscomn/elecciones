<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Colonia */

$this->title = $model->colonia_id;
$this->params['breadcrumbs'][] = ['label' => 'Colonias', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="colonia-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Actualizar', ['update', 'id' => $model->colonia_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Eliminar', ['delete', 'id' => $model->colonia_id], [
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
            'colonia_id',
            'poblacion_id',
            'sindicatura_id',
            'municipio_id',
            'colonia_nombre',
        ],
    ]) ?>

</div>
