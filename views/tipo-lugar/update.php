<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TipoLugar */

$this->title = 'Actualizar tipo de lugar: ' . ' ' . $model->tipo_lugar_nombre;
$this->params['breadcrumbs'][] = ['label' => 'Tipo de Lugar', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->tipo_lugar_nombre, 'url' => ['view', 'id' => $model->tipo_lugar_id]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="tipo-lugar-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
