<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Incidente */

$this->title = 'Crear Incidente';
$this->params['breadcrumbs'][] = ['label' => 'Incidentes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="incidente-create">    

    <div class="clearfix"></div>

    <?= $this->render('_form', [
        'model' => $model,

        'municipios'=>$municipios,
        'operativos'=>$operativos,
        'claseIncidente'=>$claseIncidente,
    ]); ?>

</div>
