<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Incidente */

$this->title = 'Create Incidente';
$this->params['breadcrumbs'][] = ['label' => 'Incidentes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="incidente-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'municipios'=>$municipios,
        'operativos'=>$operativos,
        'claseIncidente'=>$claseIncidente,
    ]) ?>

</div>
