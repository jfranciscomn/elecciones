<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Corporacion */

$this->title = $model->corporacion_id;
$this->params['breadcrumbs'][] = ['label' => 'Corporacions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="corporacion-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->corporacion_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->corporacion_id], [
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
            'corporacion_id',
            'corporacion_nombre',
            'tipo_corporacion_id',
        ],
    ]) ?>

</div>
