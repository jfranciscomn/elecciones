<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Operativo */

$this->title = 'Create Operativo';
$this->params['breadcrumbs'][] = ['label' => 'Operativos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="operativo-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
