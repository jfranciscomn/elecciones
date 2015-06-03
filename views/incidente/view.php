<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;
use yii\widgets\DetailView;
use yii\widgets\Pjax;
/**
* @var $this yii\web\View 
* @var $model app\models\Incidente 
*/
$this->title = 'Detalles del Incidente' .$model->incidente_id. '';
$this->params['breadcrumbs'][] = ['label' => 'Incidentes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => (string)$model->incidente_id, 'url' => ['view', 'incidente_id' => $model->incidente_id]];
$this->params['breadcrumbs'][] = 'Detalle Incidente';
?>

<div class="incidente-view">
    <p class='pull-left'>
        
        <?= Html::a('<span class="glyphicon glyphicon-plus"></span> Nuevo Incidente', ['create'], ['class' => 'btn
        btn-success']) ?>
    </p>

    <p class='pull-right'>
        <?= Html::a('<span class="glyphicon glyphicon-list"></span> Listar Incidentes', ['index'], ['class'=>'btn btn-default']) ?>
    </p><div class='clearfix'></div> 

    <h3>
        <?= $model->incidente_id ?>    
    </h3>

    <?php $this->beginBlock('app\models\Incidente'); ?>
    <div class='clearfix'></div>    
        <br/>
        <div class="panel panel-primary" id='divdenunciante'>
                <div class="panel-heading">Corporaciones Agregadas </div>
                <div class="panel-body">
        <?php echo DetailView::widget([
            'model' => $model,
            'attributes' => [
                'incidente_id',
                'fecha',
                'claseName',
                'subclaseName',
                //'subclase2Name',
                //'colonia_id',
                //'poblacion_id',
                //'sindicatura_id',
                //'municipio_id',
                'municipioName',
                'sindicaturaName',
                'poblacionName',
                'coloniaName',
                
                
                
                'lugarName',
                'lugar.distrito',
                
                
                //'subclase2Incidente.subclase2_incidente_nombre',
                //'subclase_incidente_id',
                //'clase_incidente_id',
                
                //'usuario.usuario_nombre',
                'direccion:ntext',
                //'lugar_id',
                'descripcion:ntext',
            ],
        ]);
        ?>


            
        </div>
    </div>
    <?php echo Html::a('<span class="glyphicon glyphicon-trash"></span> Eliminar', ['delete', 'incidente_id' => $model->incidente_id],
                [
                    'class' => 'btn btn-danger',
                    'data-confirm' => Yii::t('app', '¿Seguro que quieres eliminar el objeto?'),
                    'data-method' => 'post',
                ]); 
            ?>
    <?php $this->endBlock(); ?>


    <?php $this->beginBlock('Corporacions'); ?>
        <p class='pull-right'>
            <?= \yii\helpers\Html::a(
                    '<span class="glyphicon glyphicon-list"></span> Listar todas las corporaciones',
                    ['corporacion/index'],
                    ['class'=>'btn text-muted btn-xs']
                ) 
            ?>
            <?= \yii\helpers\Html::a(
                    '<span class="glyphicon glyphicon-plus"></span> Agregar Corporacion',
                    ['agregar-corporacion', 'incidente_id'=>$model->incidente_id],
                    ['class'=>'btn btn-success btn-xs']
                ) 
            ?>
          
        </p>

        <div class='clearfix'></div>    
        <div class="panel panel-primary" id='divdenunciante'>
                <div class="panel-heading">Corporaciones Agregadas </div>
                <div class="panel-body">

                        <?= GridView::widget([
                        'dataProvider' => $dataProviderCorporacion,
                        
                        'columns' => [
                            ['class' => 'yii\grid\SerialColumn'],

                            'corporacion.corporacion_nombre',
        

                            ['class' => 'yii\grid\ActionColumn', 'template'=>'{delete}',
                                 'urlCreator' => function ($action, $model, $key, $index) {
                                        if ($action === 'delete') {
                                            return Url::to(['corporacion-delete','incidente_id'=>$key['incidente_id'],'corporacion_id'=>$key['corporacion_id']]);
                                        }
                                    }
                            ],
                        ],
                    ]); ?>
                    
    
                </div>
        </div>
    <?php $this->endBlock() ?>


    <?php $this->beginBlock('Personas'); ?>
        <p class='pull-right'>
        
            <?= \yii\helpers\Html::a(
                    '<span class="glyphicon glyphicon-plus"></span> Agregar Persona',
                    ['agregar-persona', 'incidente_id'=>$model->incidente_id],
                    ['class'=>'btn btn-success btn-xs']
                ) 
            ?>
        </p><div class='clearfix'></div>

        <div class="panel panel-primary" id='divpersonas'>
                <div class="panel-heading">Personas Agregadas </div>
                <div class="panel-body">

                        <?= GridView::widget([
                        'dataProvider' => $dataProviderPersonas,
                        
                        'columns' => [
                            ['class' => 'yii\grid\SerialColumn'],

                            'estadoPersona.estado_persona_nombre',
                            'persona_nombre',
                            'sexo',
        

                            ['class' => 'yii\grid\ActionColumn', 'template'=>'{view}{delete}',
                                 'urlCreator' => function ($action, $model, $key, $index) {
                                        if ($action === 'delete') {
                                            return Url::to(['persona-delete','persona_id'=>$key]);
                                        }
                                        
                                    }
                            ],
                        ],
                    ]); ?>
                    
    
                </div>
        </div>
    <?php $this->endBlock() ?>


    <?php $this->beginBlock('Vehiculos'); ?>
        <p class='pull-right'>
            
            <?= \yii\helpers\Html::a(
                    '<span class="glyphicon glyphicon-plus"></span> Agregar Vehiculo',
                    ['agregar-vehiculo', 'incidente_id'=>$model->incidente_id],
                    ['class'=>'btn btn-success btn-xs']
                )
             ?>
        </p><div class='clearfix'></div>
        <div class="panel panel-primary" id='divdenunciante'>
                <div class="panel-heading">Vehiculos Agregados </div>
                <div class="panel-body">

                        <?= GridView::widget([
                        'dataProvider' => $dataProviderVehiculo,
                        
                        'columns' => [
                            ['class' => 'yii\grid\SerialColumn'],

                            'estadoVehiculo.estado_vehiculo_nombre',
                            'marcaVehiculo.marca_vehiculoco_nombre',
                            'gamaVehiculo.gama_vehiculo_nombre',
                            'placas',
                            
                            
        

                            ['class' => 'yii\grid\ActionColumn', 'template'=>'{delete}',
                                 'urlCreator' => function ($action, $model, $key, $index) {
                                        if ($action === 'delete') {
                                            return Url::to(['vehiculo-delete','vehiculo_id'=>$key]);
                                        }
                                    }
                            ],
                        ],
                    ]); ?>
                    
    
                </div>
        </div>


    <?php $this->endBlock() ?>


    <?= \yii\bootstrap\Tabs::widget([
                'id' => 'relation-tabs',
                    'encodeLabels' => false,
                    'items' => [ 
                                    [
                                    'label'   => '<span class="glyphicon glyphicon-asterisk"></span> Incidente',
                                    'content' => $this->blocks['app\models\Incidente'],
                                    'active'  => true,
                                    ],
                                    [
                                    'label'   => '<small><span class="glyphicon glyphicon-paperclip"></span> Corporaciones</small>',
                                    'content' => $this->blocks['Corporacions'],
                                    'active'  => false,
                                    ],
                                    [
                                    'label'   => '<small><span class="glyphicon glyphicon-paperclip"></span> Personas</small>',
                                    'content' => $this->blocks['Personas'],
                                    'active'  => false,
                                    ],
                                    [
                                    'label'   => '<small><span class="glyphicon glyphicon-paperclip"></span> Vehiculos</small>',
                                    'content' => $this->blocks['Vehiculos'],
                                    'active'  => false,
                                    ],
                                    [
                                    'label'   => '<small><span class="glyphicon glyphicon-paperclip"></span> Razonamiento</small>',
                                    'content' => '',
                                    'active'  => false,
                                    ], 
                                ]
                            ]
                        );
    ?>
</div>


    

</div>
