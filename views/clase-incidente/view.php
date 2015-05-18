<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\ClaseIncidente */

$this->title = $model->clase_incidente_id;
$this->params['breadcrumbs'][] = ['label' => 'Clase Incidentes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="clase-incidente-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->clase_incidente_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->clase_incidente_id], [
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
            'clase_incidente_id',
            'clase_incidente_nombre',
        ],
    ]) ?>

</div>
