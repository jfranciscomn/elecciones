<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\GamaVehiculoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Gama Vehiculos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="gama-vehiculo-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Gama Vehiculo', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'gama_vehiculo_id',
            'marca_vehiculo_id',
            'gama_vehiculo_nombre',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
