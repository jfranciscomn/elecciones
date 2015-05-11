<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Accion */

$this->title = 'Accion: ' . ' ' . $model->accion_id;
$this->params['breadcrumbs'][] = ['label' => 'Accions', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->accion_id, 'url' => ['view', 'id' => $model->accion_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="accion-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
