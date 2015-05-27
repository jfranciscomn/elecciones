<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Subclase2Incidente */

$this->title = 'Actualizar incidente: ' . ' ' . $model->subclase2_incidente_nombre;
$this->params['breadcrumbs'][] = ['label' => 'Incidente de subclase 2', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->subclase2_incidente_nombre, 'url' => ['view', 'id' => $model->subclase2_incidente_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="subclase2-incidente-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'claseIncidentes' => $claseIncidentes,

    ]) ?>

</div>
