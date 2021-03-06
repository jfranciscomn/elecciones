<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Grupo */

$this->title = 'Crear Grupo';
$this->params['breadcrumbs'][] = ['label' => 'Grupos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="grupo-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'lista_accion'=>$lista_accion,
    ]) ?>

</div>
