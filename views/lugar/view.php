<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Lugar */

$this->title = $model->lugar_nombre;
$this->params['breadcrumbs'][] = ['label' => 'Lugar', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="lugar-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Actualizar', ['update', 'id' => $model->lugar_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Eliminar', ['delete', 'id' => $model->lugar_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => '¿Seguro que quieres eliminar el objeto seleccionado?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'lugar_id',
            //'tipo_lugar_id',
            //'poblacion_id',
            //'sindicatura_id',
            //'municipio_id',
            'tipoName',
            'municipioName',
            //'sindicaturaName',
            'poblacionName',
            'lugar_nombre',
            //'colonia_id',
            'direccion',
        ],
    ]) ?>

</div>
