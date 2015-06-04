<?php

use yii\helpers\Html;
use yii\grid\GridView;

/**
* @var yii\web\View $this
* @var yii\data\ActiveDataProvider $dataProvider
* @var app\models\search\IncidenteSearch $searchModel
*/

$this->title = 'Incidentes';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="incidente-index">
    <?php //     echo $this->render('_search', ['model' =>$searchModel]);?>
    <div class="clearfix">
        <p class="pull-left">
            <?= Html::a('<span class="glyphicon glyphicon-plus"></span> Nuevo Incidente', ['create'], ['class' => 'btn btn-success']) ?>
        </p>

    </div>
    <?php echo GridView::widget([
        'dataProvider' => $dataProvider,        
        'filterModel' => $searchModel,                                                                     
        'columns' => [     
            ['class' => 'yii\grid\SerialColumn'],   
            //'incidente_id',
            //'colonia_id',
            //'poblacion_id',
            //'sindicatura_id',
            //'municipio_id',
            'fecha',
            'coloniaName',
            'poblacionName',
            
            'municipioName',
            'lugarName',
            'claseName',
            'subclaseName',
            //'claseName',
            //'operativo_id',
            //'subclase2_incidente_id',
            /*'subclase_incidente_id'*/
            //'claseIncidente.clase_incidente_nombre',
            /*'usuario_id'*/
            /*'direccion:ntext'*/
            /*'lugar_id'*/
            /*'descripcion:ntext'*/
            [
                'class' => 'yii\grid\ActionColumn',
                'urlCreator' => function($action, $model, $key, $index) {
                    // using the column name as key, not mapping to 'id' like the standard generator
                    $params = is_array($key) ? $key : [$model->primaryKey()[0] => (string) $key];
                    $params[0] = \Yii::$app->controller->id ? \Yii::$app->controller->id . '/' . $action : $action;
                    return \yii\helpers\Url::toRoute($params);
                },
                'contentOptions' => ['nowrap'=>'nowrap']
            ],
        ],
    ]);?>
    
</div>


