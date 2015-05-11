<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Poblacion */

$this->title = 'Update Poblacion: ' . ' ' . $model->poblacion_id;
$this->params['breadcrumbs'][] = ['label' => 'Poblacions', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->poblacion_id, 'url' => ['view', 'id' => $model->poblacion_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="poblacion-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'municipios'=>$municipios,
    ]) ?>

</div>
