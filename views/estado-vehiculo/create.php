<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\EstadoVehiculo */

$this->title = 'Nuevo Estado';
$this->params['breadcrumbs'][] = ['label' => 'Estado de Vehiculo', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="estado-vehiculo-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
