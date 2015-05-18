<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\SubclaseIncidenteSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Subclase Incidentes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="subclase-incidente-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Subclase Incidente', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'subclase_incidente_id',
            'clase_incidente_id',
            'subclase_incidente_nombre',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
