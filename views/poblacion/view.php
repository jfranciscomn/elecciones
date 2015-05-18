<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Poblacion */

$this->title = $model->poblacion_id;
$this->params['breadcrumbs'][] = ['label' => 'Poblaciones', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="poblacion-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->poblacion_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->poblacion_id], [
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
            //'poblacion_id',
            'sindicatura.sindicatura_nombre',
            'municipio.municipio_nombre',
            'poblacion_nombre',
        ],
    ]) ?>

</div>
