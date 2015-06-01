<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\MarcaVehiculoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Marca Vehiculos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="marca-vehiculo-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Marca Vehiculo', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'marca_vehiculo_id',
            'marca_vehiculoco_nombre',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
