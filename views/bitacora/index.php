<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\BitacoraSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Bitacoras';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bitacora-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

   

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            
            'fecha',
            'REMOTE_ADDR',
            'usuario.username',
            'accion.controlador.controlador_nombre',
            'accion.accion_nombre',
            //'datos_enviados:ntext',
            // 'HTTP_USER_AGENT:ntext',
            // 'HTTP_HOST',
            // 'SERVER_PORT',
            // 'REMOTE_ADDR',
            // 'REMOTE_PORT',
            // 'SERVER_PROTOCOL',
            // 'REQUEST_METHOD',
            // 'REQUEST_URI',
            // 'resultado',

            ['class' => 'yii\grid\ActionColumn', 'template' => '{view} '],
        ],
    ]); ?>

</div>
