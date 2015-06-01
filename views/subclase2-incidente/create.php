<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Subclase2Incidente */

$this->title = 'Crear Detalle de Incidente 2';
$this->params['breadcrumbs'][] = ['label' => 'Detalle de Incidente 2', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="subclase2-incidente-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
                        'claseIncidentes' => $claseIncidentes,

    ]) ?>

</div>
