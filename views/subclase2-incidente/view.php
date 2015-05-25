<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Subclase2Incidente */

$this->title = $model->subclase2_incidente_id;
$this->params['breadcrumbs'][] = ['label' => 'Subclase2 Incidentes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="subclase2-incidente-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->subclase2_incidente_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->subclase2_incidente_id], [
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
            'subclase2_incidente_id',
            'subclase_incidente_id',
            'clase_incidente_id',
            'subclase2_incidente_nombre',
        ],
    ]) ?>

</div>