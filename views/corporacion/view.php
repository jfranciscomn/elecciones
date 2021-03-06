<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Corporacion */

$this->title = $model->corporacion_nombre;
$this->params['breadcrumbs'][] = ['label' => 'Corporacion', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="corporacion-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Actualizar', ['update', 'id' => $model->corporacion_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Eliminar', ['delete', 'id' => $model->corporacion_id], [
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
            'corporacion_id',
            'corporacion_nombre',
            'tipo_corporacion_id',
        ],
    ]) ?>

</div>
