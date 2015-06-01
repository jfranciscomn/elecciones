<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\Controlador;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\AccionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Acciones';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="accion-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <!-- Html::a('Crear Accion', ['create'], ['class' => 'btn btn-success']) -->
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            /*'accion_id',*/
            'controlador.controlador_nombre',
            /*'controlador_id',*/
            'accion_nombre',

            ['class' => 'yii\grid\ActionColumn', 'template'=>'{view}'],
        ],
    ]); ?>

</div>
