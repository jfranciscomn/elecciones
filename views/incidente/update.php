<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Incidente */

$this->title = 'Update Incidente: ' . ' ' . $model->incidente_id;
$this->params['breadcrumbs'][] = ['label' => 'Incidentes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->incidente_id, 'url' => ['view', 'id' => $model->incidente_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="incidente-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
