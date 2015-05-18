<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Subclase2Incidente */

$this->title = 'Create Subclase2 Incidente';
$this->params['breadcrumbs'][] = ['label' => 'Subclase2 Incidentes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="subclase2-incidente-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
