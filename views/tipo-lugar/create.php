<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\TipoLugar */

$this->title = 'Crear tipo de lugar';
$this->params['breadcrumbs'][] = ['label' => 'Tipo de Lugar', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tipo-lugar-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
