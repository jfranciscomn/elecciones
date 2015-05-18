<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Operativo */

$this->title = 'Update Operativo: ' . ' ' . $model->operativo_id;
$this->params['breadcrumbs'][] = ['label' => 'Operativos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->operativo_id, 'url' => ['view', 'id' => $model->operativo_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="operativo-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
