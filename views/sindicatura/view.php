<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Sindicatura */

$this->title = $model->sindicatura_nombre;
$this->params['breadcrumbs'][] = ['label' => 'Sindicaturas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sindicatura-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Actualizar', ['update', 'id' => $model->sindicatura_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Eliminar', ['delete', 'id' => $model->sindicatura_id], [
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
            //'sindicatura_id',
            //'municipio_id',
            'municipioName',
            'sindicatura_nombre',
        ],
    ]) ?>

</div>
