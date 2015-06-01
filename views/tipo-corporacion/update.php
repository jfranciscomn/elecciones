<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TipoCorporacion */

$this->title = 'Actualizar Tipo de Corporacion: ' . ' ' . $model->tipo_corporacion_nombre;
$this->params['breadcrumbs'][] = ['label' => 'Tipo de Corporacion', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->tipo_corporacion_nombre, 'url' => ['view', 'id' => $model->tipo_corporacion_id]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="tipo-corporacion-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
