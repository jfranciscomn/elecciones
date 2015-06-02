<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\GamaVehiculo */

$this->title = 'Agregar Nueva Gama';
$this->params['breadcrumbs'][] = ['label' => 'Gama del Vehiculo', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="gama-vehiculo-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
                'marcaVehiculos' => $marcaVehiculos,
    ]) ?>

</div>
