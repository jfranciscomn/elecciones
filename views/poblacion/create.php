<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Poblacion */

$this->title = 'Create Poblacion';
$this->params['breadcrumbs'][] = ['label' => 'Poblacions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="poblacion-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'municipios'=>$municipios,
    ]) ?>

</div>
