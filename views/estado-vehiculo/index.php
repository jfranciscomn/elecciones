<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\CorporacionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Estado del Vehiculo';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="estado-vehiculo-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Agregar nuevo Estado', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'estado_vehiculo_id',
            'estado_vehiculo_nombre',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>