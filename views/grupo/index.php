<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\GrupoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Grupos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="grupo-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Agregar Nuevo Grupo', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            
            'grupo_nombre',

            ['class' => 'yii\grid\ActionColumn','template'=>'{view} {update} {delete}'],
        ],
    ]); ?>

</div>
