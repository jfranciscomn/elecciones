<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TipoLugar */

$this->title = 'Update Tipo Lugar: ' . ' ' . $model->tipo_lugar_id;
$this->params['breadcrumbs'][] = ['label' => 'Tipo Lugars', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->tipo_lugar_id, 'url' => ['view', 'id' => $model->tipo_lugar_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tipo-lugar-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
