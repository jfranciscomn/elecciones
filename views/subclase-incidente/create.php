<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\SubclaseIncidente */

$this->title = 'Crear Detalle de Incidente';
$this->params['breadcrumbs'][] = ['label' => 'Detalle de Incidente', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="subclase-incidente-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'claseIncidentes' => $claseIncidentes,
    ]) ?>

</div>
