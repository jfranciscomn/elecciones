<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Accion */

$this->title = $model->accion_nombre;
$this->params['breadcrumbs'][] = ['label' => 'Accion', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="accion-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
       <!--  Html::a('Actualizar', ['update', 'id' => $model->accion_id], ['class' => 'btn btn-primary']) 
         Html::a('Eliminar', ['delete', 'id' => $model->accion_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => '¿Estas seguro que quieres eliminar el contenido seleccionado?',
                'method' => 'post',
            ],
        ]) 
    -->
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            /*'accion_id',*/
            /*'controlador_id',*/
            'controlador.controlador_nombre',
            'accion_nombre',
        ],
    ]) ?>

</div>
