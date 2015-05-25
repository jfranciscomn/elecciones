<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Municipio */

$this->title = 'Actualizar Municipio: ' . ' ' . $model->municipio_nombre;
$this->params['breadcrumbs'][] = ['label' => 'Municipio', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->municipio_nombre, 'url' => ['view', 'id' => $model->municipio_id]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="municipio-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'zonas' => $zonas,
    ]) ?>

</div>
