<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Corporacion */

$this->title = 'Create Corporacion';
$this->params['breadcrumbs'][] = ['label' => 'Corporacions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="corporacion-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
