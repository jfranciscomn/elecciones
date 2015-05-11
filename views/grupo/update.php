<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Grupo */

$this->title = 'Actualizar Grupo: ' . ' ' . $model->grupo_id;
$this->params['breadcrumbs'][] = ['label' => 'Grupos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->grupo_id, 'url' => ['view', 'id' => $model->grupo_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="grupo-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'lista_accion'=>$lista_accion,
    ]) ?>

</div>
