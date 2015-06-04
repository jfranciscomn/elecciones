<?php

use yii\helpers\Html;
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
        <?= Html::a('<span class="glyphicon glyphicon-pencil"></span> Editar', ['update', 'incidente_id' => $model->incidente_id],
        ['class' => 'btn btn-info']) ?>
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
        <?php echo DetailView::widget([
            'model' => $model,
            'attributes' => [
                'incidente_id',
                'operativo.operativo_nombre',
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
                'subclase2Name',
                'usuarioName',
                //'subclase2Incidente.subclase2_incidente_nombre',
                //'subclase_incidente_id',
                //'clase_incidente_id',
                'fecha',
                //'usuario.usuario_nombre',
                'direccion:ntext',
                //'lugar_id',
                'descripcion:ntext',
            ],
        ]);
        ?>
        <hr/>
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
                    '<span class="glyphicon glyphicon-plus"></span> Crear Corporacion',
                    ['corporacion/create', 'Corporacion'=>['corporacion_id'=>$model->incidente_id]],
                    ['class'=>'btn btn-success btn-xs']
                ) 
            ?>
            <?= \yii\helpers\Html::a(
                    '<span class="glyphicon glyphicon-link"></span> Agregar Corporacion', 
                    ['incidente-has-corporacion/create', 'IncidenteHasCorporacion'=>['$n'=>['incidente_id'=>$model->incidente_id]]],
                    ['class'=>'btn btn-info btn-xs']
                ) 
            ?>
        </p>
        <div class='clearfix'></div>    
    <?php $this->endBlock() ?>


    <?php $this->beginBlock('Personas'); ?>
        <p class='pull-right'>
            <?= \yii\helpers\Html::a(
                    '<span class="glyphicon glyphicon-list"></span> Listar Todas las Personas',
                    ['persona/index'],
                    ['class'=>'btn text-muted btn-xs']                                                                              
                ) 
            ?>
            <?= \yii\helpers\Html::a(
                    '<span class="glyphicon glyphicon-plus"></span> Crear Persona',
                    ['persona/create', 'Persona'=>['incidente_id'=>$model->incidente_id]],
                    ['class'=>'btn btn-success btn-xs']
                ) 
            ?>
        </p><div class='clearfix'></div>
    <?php $this->endBlock() ?>


    <?php $this->beginBlock('Vehiculos'); ?>
        <p class='pull-right'>
            <?= \yii\helpers\Html::a(
                    '<span class="glyphicon glyphicon-list"></span> Listar Todos los Vehiculos',
                    ['vehiculo/index'],
                    ['class'=>'btn text-muted btn-xs']
                ) 
            ?>
            <?= \yii\helpers\Html::a(
                    '<span class="glyphicon glyphicon-plus"></span> Crear Vehiculo',
                    ['vehiculo/create', 'Vehiculo'=>['incidente_id'=>$model->incidente_id]],
                    ['class'=>'btn btn-success btn-xs']
                )
             ?>
        </p><div class='clearfix'></div>
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
                                ]
                            ]
                        );
    ?>
</div>
</div>
