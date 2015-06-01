<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\MarcaVehiculo */

$this->title = 'Create Marca Vehiculo';
$this->params['breadcrumbs'][] = ['label' => 'Marca Vehiculos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="marca-vehiculo-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
