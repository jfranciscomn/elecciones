<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Sindicatura */

$this->title = 'Update Sindicatura: ' . ' ' . $model->sindicatura_id;
$this->params['breadcrumbs'][] = ['label' => 'Sindicaturas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->sindicatura_id, 'url' => ['view', 'id' => $model->sindicatura_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="sindicatura-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'municipios'=>$municipios,

    ]) ?>

</div>
