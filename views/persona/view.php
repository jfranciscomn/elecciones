<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Persona */

$this->title = $model->persona_id;
$this->params['breadcrumbs'][] = ['label' => 'Personas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="persona-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->persona_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->persona_id], [
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
            'persona_id',
            'incidente_id',
            'estado_persona_id',
            'persona_nombre',
            'edad',
            'sexo',
            'domicilio',
            'colonia_id',
            'poblacion_id',
            'sindicatura_id',
            'municipio_id',
        ],
    ]) ?>

</div>
