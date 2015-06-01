<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\EstadoVehiculo */

$this->title = 'Create Estado Vehiculo';
$this->params['breadcrumbs'][] = ['label' => 'Estado Vehiculos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="estado-vehiculo-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
