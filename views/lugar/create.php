<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Lugar */

$this->title = 'Crear Lugar';
$this->params['breadcrumbs'][] = ['label' => 'Lugar', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="lugar-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'municipios' => $municipios,
        'tipos' => $tipos,
    ]) ?>

</div>
