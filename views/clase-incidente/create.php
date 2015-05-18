<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\ClaseIncidente */

$this->title = 'Create Clase Incidente';
$this->params['breadcrumbs'][] = ['label' => 'Clase Incidentes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="clase-incidente-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
