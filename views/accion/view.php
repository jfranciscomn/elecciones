<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Accion */

$this->title = $model->accion_id;
$this->params['breadcrumbs'][] = ['label' => 'Accions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="accion-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->accion_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->accion_id], [
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
            'accion_id',
            'controlador_id',
            'accion_nombre',
        ],
    ]) ?>

</div>
