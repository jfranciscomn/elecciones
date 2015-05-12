<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\IncidenteSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Incidentes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="incidente-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Incidente', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'incidente_id',
            'colonia_id',
            'poblacion_id',
            'sindicatura_id',
            'municipio_id',
            // 'operativo_id',
            // 'subclase2_incidente_id',
            // 'subclase_incidente_id',
            // 'clase_incidente_id',
            // 'fecha',
            // 'usuario_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
