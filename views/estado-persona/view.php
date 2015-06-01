<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\EstadoPersona */

$this->title = $model->estado_persona_nombre;
$this->params['breadcrumbs'][] = ['label' => 'Estado de la Persona', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="estado-persona-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Actualizar', ['update', 'id' => $model->estado_persona_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Eliminar', ['delete', 'id' => $model->estado_persona_id], [
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
            'estado_persona_id',
            'estado_persona_nombre',
        ],
    ]) ?>

</div>
