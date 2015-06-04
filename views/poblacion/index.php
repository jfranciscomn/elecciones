<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\PoblacionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Poblaciones';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="poblacion-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Agregar Nueva Poblacion', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'poblacion_nombre',
            'municipioName',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
