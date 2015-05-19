<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Colonia */

$this->title = 'Actualizar Colonia: ' . ' ' . $model->colonia_nombre;
$this->params['breadcrumbs'][] = ['label' => 'Colonias', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->colonia_nombre, 'url' => ['view', 'id' => $model->colonia_id]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="colonia-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'municipios'=>$municipios,
    ]) ?>

</div>
