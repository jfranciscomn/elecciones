<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Sindicatura */

$this->title = 'Crear Sindicatura';
$this->params['breadcrumbs'][] = ['label' => 'Sindicaturas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sindicatura-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'municipios'=>$municipios,
    ]) ?>

</div>
