<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\ClaseIncidente */

$this->title = 'Crear Clase de Incidente';
$this->params['breadcrumbs'][] = ['label' => 'Clase de Incidente', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="clase-incidente-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
