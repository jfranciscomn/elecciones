<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ClaseIncidente */

$this->title = 'Actualizar Clase de Incidente: ' . ' ' . $model->clase_incidente_nombre;
$this->params['breadcrumbs'][] = ['label' => 'Clase Incidentes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->clase_incidente_nombre, 'url' => ['view', 'id' => $model->clase_incidente_id]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="clase-incidente-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
