<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Lugar */

$this->title = 'Actualizar lugar: ' . ' ' . $model->lugar_nombre;
$this->params['breadcrumbs'][] = ['label' => 'Lugar', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->lugar_nombre, 'url' => ['view', 'id' => $model->lugar_id]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="lugar-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'municipios' => $municipios,
        'tipos' => $tipos,
    ]) ?>

</div>
