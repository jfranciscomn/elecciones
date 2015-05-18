<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Operativo */

$this->title = $model->operativo_id;
$this->params['breadcrumbs'][] = ['label' => 'Operativos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="operativo-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->operativo_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->operativo_id], [
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
            'operativo_id',
            'operativo_nombre',
            'fecha_inicio',
            'fecha_fin',
            'activo',
        ],
    ]) ?>

</div>
