<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\OperativoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Operativos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="operativo-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Agregar Nuevo Operativo', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'operativo_id',
            'operativo_nombre',
            'fecha_inicio',
            'fecha_fin',
            'activo',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
