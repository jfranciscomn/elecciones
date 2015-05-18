<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\SubclaseIncidente */

$this->title = 'Create Subclase Incidente';
$this->params['breadcrumbs'][] = ['label' => 'Subclase Incidentes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="subclase-incidente-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
