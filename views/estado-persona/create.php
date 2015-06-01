<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\EstadoPersona */

$this->title = 'Crear Estado la Persona';
$this->params['breadcrumbs'][] = ['label' => 'Estado de la Persona', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="estado-persona-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
