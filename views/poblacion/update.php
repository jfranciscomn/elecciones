<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Poblacion */

$this->title = 'Actualizar Poblacion: ' . ' ' . $model->poblacion_nombre;
$this->params['breadcrumbs'][] = ['label' => 'Poblaciones', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->poblacion_nombre, 'url' => ['view', 'id' => $model->poblacion_id]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="poblacion-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'municipios'=>$municipios,
    ]) ?>

</div>
