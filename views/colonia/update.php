<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Colonia */

$this->title = 'Update Colonia: ' . ' ' . $model->colonia_id;
$this->params['breadcrumbs'][] = ['label' => 'Colonias', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->colonia_id, 'url' => ['view', 'id' => $model->colonia_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="colonia-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
