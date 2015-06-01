<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\CorporacionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Corporacions';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="corporacion-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Corporacion', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'corporacion_id',
            'corporacion_nombre',
            'tipo_corporacion_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
