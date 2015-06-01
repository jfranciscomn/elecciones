<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\TipoCorporacion */

$this->title = 'Crear Tipo de Corporacion';
$this->params['breadcrumbs'][] = ['label' => 'Tipo de Corporacion', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tipo-corporacion-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
