<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Incidente */

$this->title = 'Actualizar Incidente: ' . ' ' . $model->incidente_nombre;
$this->params['breadcrumbs'][] = ['label' => 'Incidentes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->incidente_nombre, 'url' => ['view', 'id' => $model->incidente_id]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="incidente-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
