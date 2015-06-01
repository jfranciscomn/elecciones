<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TipoCorporacion */

$this->title = 'Update Tipo Corporacion: ' . ' ' . $model->tipo_corporacion_id;
$this->params['breadcrumbs'][] = ['label' => 'Tipo Corporacions', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->tipo_corporacion_id, 'url' => ['view', 'id' => $model->tipo_corporacion_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tipo-corporacion-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
