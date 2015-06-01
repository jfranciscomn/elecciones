<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\SubclaseIncidente */

$this->title = 'Actualizar Detalle de Incidente: ' . ' ' . $model->subclase_incidente_id;
$this->params['breadcrumbs'][] = ['label' => 'Detalle de Incidente', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->subclase_incidente_nombre, 'url' => ['view', 'id' => $model->subclase_incidente_id]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="subclase-incidente-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'claseIncidentes' => $claseIncidentes,
    ]) ?>

</div>
