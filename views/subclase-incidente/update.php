<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\SubclaseIncidente */

$this->title = 'Update Subclase Incidente: ' . ' ' . $model->subclase_incidente_id;
$this->params['breadcrumbs'][] = ['label' => 'Subclase Incidentes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->subclase_incidente_id, 'url' => ['view', 'id' => $model->subclase_incidente_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="subclase-incidente-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
