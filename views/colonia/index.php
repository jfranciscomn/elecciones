<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\ColoniaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Colonias';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="colonia-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Agregar Nueva Colonia', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'colonia_id',
            //'poblacion.poblacion_nombre',
            //'sindicatura.sindicatura_nombre',
            //'municipio.municipio_nombre',
            'poblacionName',
            'municipioName',
            //'sindicaturaName',
            'colonia_nombre',
            

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
