<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\VehiculoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Vehiculos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="vehiculo-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Vehiculo', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'vehiculo_id',
            'incidente_id',
            'estado_vehiculo_id',
            'gama_vehiculo_id',
            'marca_vehiculo_id',
            // 'placas',
            // 'modelo',
            // 'numero_serie',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
