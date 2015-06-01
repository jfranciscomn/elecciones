<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Corporacion */

$this->title = 'Actualizar Corporacion: ' . ' ' . $model->corporacion_nombre;
$this->params['breadcrumbs'][] = ['label' => 'Corporacion', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->corporacion_nombre, 'url' => ['view', 'id' => $model->corporacion_id]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="corporacion-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'corporacionesTipos' => $corporacionesTipos,

    ]) ?>

</div>
