<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Grupo */

$this->title = $model->grupo_id;
$this->params['breadcrumbs'][] = ['label' => 'Grupos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="grupo-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Actualizar', ['update', 'id' => $model->grupo_id], ['class' => 'btn btn-primary']) ?>
        <?=   Html::a('Eliminar', ['delete', 'id' => $model->grupo_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => '¿Seguro que quieres eliminar el objeto?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'grupo_id',
            'grupo_nombre',
        ],
    ]) ?>

</div>
