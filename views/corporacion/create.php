<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Corporacion */

$this->title = 'Crear Corporacion';
$this->params['breadcrumbs'][] = ['label' => 'Corporacion', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="corporacion-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'corporacionesTipos' => $corporacionesTipos,

    ]) ?>

</div>
