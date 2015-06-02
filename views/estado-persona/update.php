<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\EstadoPersona */

$this->title = 'Actualizar Estado: ' . ' ' . $model->estado_persona_nombre;
$this->params['breadcrumbs'][] = ['label' => 'Estado de la Persona', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->estado_persona_nombre, 'url' => ['view', 'id' => $model->estado_persona_id]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="estado-persona-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
