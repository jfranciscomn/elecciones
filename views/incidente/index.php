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

        <div class="pull-right">                                                                                                                                                
            <?php echo \yii\bootstrap\ButtonDropdown::widget([
                'id' => 'giiant-relations',
                'encodeLabel' => false,
                'label' => '<span class="glyphicon glyphicon-paperclip"></span> Relations',
                'dropdown' => [
                    'options' => [
                        'class' => 'dropdown-menu-right'
                    ],
                    'encodeLabels' => false,
                    'items' => [
                                    [
                                        'label' => '<i class="glyphicon glyphicon-arrow-left"> Colonia</i>',
                                        'url' => [
                                            'colonia/index',
                                        ],
                                    ],
                                    [
                                        'label' => '<i class="glyphicon glyphicon-arrow-left"> Subclase2 Incidente</i>',
                                        'url' => [
                                            'subclase2-incidente/index',
                                        ],
                                    ],
                                    [
                                        'label' => '<i class="glyphicon glyphicon-arrow-left"> Clase Incidente</i>',
                                        'url' => [
                                            'clase-incidente/index',
                                        ],
                                    ],
                                    [
                                        'label' => '<i class="glyphicon glyphicon-arrow-left"> Municipio</i>',
                                        'url' => [
                                            'municipio/index',                                                    
                                        ],
                                    ],
                                    [
                                        'label' => '<i class="glyphicon glyphicon-arrow-left"> Operativo</i>',
                                        'url' => [
                                            'operativo/index',
                                        ],
                                    ],
                                    [
                                        'label' => '<i class="glyphicon glyphicon-arrow-left"> Poblacion</i>',
                                        'url' => [
                                            'poblacion/index',
                                        ],
                                    ],
                                    [
                                        'label' => '<i class="glyphicon glyphicon-arrow-left"> Sindicatura</i>',
                                        'url' => [
                                            'sindicatura/index',
                                        ],
                                    ],
                                    [
                                        'label' => '<i class="glyphicon glyphicon-arrow-left"> Subclase Incidente</i>',
                                        'url' => [
                                            'subclase-incidente/index',
                                        ],
                                    ],
                                    [
                                        'label' => '<i class="glyphicon glyphicon-arrow-left"> Usuario</i>',
                                        'url' => [
                                            'usuario/index',
                                        ],
                                    ],
                                    [
                                        'label' => '<i class="glyphicon glyphicon-random"> Incidente Has Corporacion</i>',
                                        'url' => [
                                            'incidente-has-corporacion/index',
                                        ],
                                    ],
                                    [
                                        'label' => '<i class="glyphicon glyphicon-arrow-right"> Corporacion</i>',
                                        'url' => [
                                            'corporacion/index',
                                        ],
                                    ],
                                    [
                                        'label' => '<i class="glyphicon glyphicon-arrow-right"> Persona</i>',
                                        'url' => [
                                            'persona/index',
                                        ],
                                    ],
                                    [
                                        'label' => '<i class="glyphicon glyphicon-arrow-right"> Vehiculo</i>',
                                        'url' => [
                                            'vehiculo/index',
                                        ],
                                    ],
                        ]                   
                    ],
                ]);?>        
        </div>
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
            'coloniaName',
            'poblacionName',
            'sindicaturaName',
            'municipioName',
            'lugarName',
            'claseName',
            'subclaseName',
            //'claseName',
            //'operativo_id',
            //'subclase2_incidente_id',
            /*'subclase_incidente_id'*/
            //'claseIncidente.clase_incidente_nombre',
            /*'fecha'*/
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


