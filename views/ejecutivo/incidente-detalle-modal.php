<?php

use yii\helpers\Html;
use yii\helpers\Url;
use kartik\grid\GridView;
use yii\widgets\DetailView;
use yii\widgets\Pjax;
/**
* @var $this yii\web\View 
* @var $model app\models\Incidente 
*/

?>

<div class="incidente-view">
 


    <div class='clearfix'></div> 



    <?php $this->beginBlock('app\models\Incidente'); ?>
    <div class='clearfix'></div>    
        <br/>
        <div class="panel panel-primary" id='divdenunciante'>
                <div class="panel-heading">Incidente</div>
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
                //'lugar.distrito',
                'distrito_id',
                
                
                //'subclase2Incidente.subclase2_incidente_nombre',
                //'subclase_incidente_id',
                //'clase_incidente_id',
                
                //'usuario.usuario_nombre',
                'direccion:ntext',
                //'lugar_id',
                'descripcion:ntext',
                'incidente_estado'
            ],
        ]);
        ?>


            
        </div>
    </div>

    <?php $this->endBlock(); ?>


    <?php $this->beginBlock('Corporacions'); ?>
        

        <div class='clearfix'></div>    
        <br/>
        <div class="panel panel-primary" id='divdenunciante'>
                <div class="panel-heading">Corporaciones Agregadas </div>
                <div class="panel-body">

                        <?= GridView::widget([
                        'dataProvider' => $dataProviderCorporacion,
                        'export'=>false,                                                                  
                       'responsive'=>true,
                        'columns' => [
                            ['class' => 'yii\grid\SerialColumn'],

                            'corporacion.corporacion_nombre',
        

                            
                        ],
                    ]); ?>
                    
    
                </div>
        </div>
    <?php $this->endBlock() ?>


    <?php $this->beginBlock('Personas'); ?>
        <div class='clearfix'></div>    
        <br/>

        <div class="panel panel-primary" id='divpersonas'>
                <div class="panel-heading">Personas Agregadas </div>
                <div class="panel-body">

                        <?= GridView::widget([
                        'dataProvider' => $dataProviderPersonas,
                        'export'=>false,                                                                  
                       'responsive'=>true,
                                         
                        
                        'columns' => [
                            ['class' => 'yii\grid\SerialColumn'],

                            'estadoPersona.estado_persona_nombre',
                            'persona_nombre',
                            'sexo',
        

                        ],
                    ]); ?>
                    
    
                </div>
        </div>
    <?php $this->endBlock() ?>


    <?php $this->beginBlock('Vehiculos'); ?>
        <div class='clearfix'></div>    
        <br/>

        <div class="panel panel-primary" id='divdenunciante'>
                <div class="panel-heading">Vehiculos Agregados </div>
                <div class="panel-body">

                        <?= GridView::widget([
                        'dataProvider' => $dataProviderVehiculo,
                        'export'=>false,                                                                  
                       'responsive'=>true,
                        'columns' => [
                            ['class' => 'yii\grid\SerialColumn'],

                            'estadoVehiculo.estado_vehiculo_nombre',
                            'marcaVehiculo.marca_vehiculoco_nombre',
                            'gamaVehiculo.gama_vehiculo_nombre',
                            'placas',


                        ],
                    ]); ?>
                    
    
                </div>
        </div>


    <?php $this->endBlock() ?>


    <?php $this->beginBlock('Seguimientos'); ?>
        <div class='clearfix'></div>    
        <br/>

        <div class="panel panel-primary" id='divdenunciante'>
                <div class="panel-heading">Seguimientos </div>
                <div class="panel-body">

                        <?= GridView::widget([
                        'dataProvider' => $dataProviderSeguimiento,
                        'export'=>false,                                                                  
                       'responsive'=>true,
                        'columns' => [
                            ['class' => 'yii\grid\SerialColumn'],

                            'corporacion.corporacion_nombre',
                            'unidad',
                            'descripcion',
                            
                            
        
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
                                    'label'   => '<small><span class="glyphicon glyphicon-paperclip"></span> Seguimientos</small>',
                                    'content' => $this->blocks['Seguimientos'],
                                    'active'  => false,
                                    ], 
                                ]
                            ]
                        );
    ?>
<?php
    if($tipo=="distrito")
    {
        echo Html::a('Regresar','#', [
            'class'=>'btn btn-primary', 
            'onclick'=>"regresardistrito($model->incidente_id,'{$model->distrito->distrito_nombre}')"
            ]); 


        $this->registerJs('
            function regresardistrito(incidente_id,distrito_nombre){
                $("#distrito_label").html(distrito_nombre);
                $("#distrito_contenido").html(\'<div class="progress"><div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%"></div></div>\');
                $.ajax({
                    url: "'.Url::to(['ejecutivo/incidente-distrito-modal']).'",
                    
                    data: {nombre_distrito:distrito_nombre, incidente_estado:"'.$incidente_estado.'"},
                    success: function(data){

                         
                          $("#distrito_contenido").html(data);
                        }
                });
            }'); 
    } 
    else if($tipo=="tipo")
    {
        echo Html::a('Regresar','#', [
            'class'=>'btn btn-primary', 
            'onclick'=>"regresardistrito($model->incidente_id,'{$model->subclaseIncidente->subclase_incidente_nombre}')"
            ]); 


        $this->registerJs('
            function regresardistrito(incidente_id,subclase_nombre){
                $("#distrito_label").html(subclase_nombre);
                $("#distrito_contenido").html(\'<div class="progress"><div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%"></div></div>\');
                $.ajax({
                    url: "'.Url::to(['ejecutivo/incidente-tipo-modal']).'",
                    
                    data: {subclase_nombre:subclase_nombre, incidente_estado:"'.$incidente_estado.'"},
                    success: function(data){

                         
                          $("#distrito_contenido").html(data);
                        }
                });
            }'); 

    }
    else if($tipo=="estado")
    {
        echo Html::a('Regresar','#', [
            'class'=>'btn btn-primary', 
            'onclick'=>"regresardistrito('$incidente_estado')"
            ]); 


        $this->registerJs('
            function regresardistrito(incidente_estado){
                $("#distrito_label").html(incidente_estado);
                $("#distrito_contenido").html(\'<div class="progress"><div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%"></div></div>\');
                                                        
                $.ajax({
                    url: "'.Url::to(['ejecutivo/incidente-estado-modal']).'",
                    
                    data: {incidente_estado:incidente_estado},
                    success: function(data){

                         
                          $("#distrito_contenido").html(data);
                        }
                });
            }'); 

    }
?>
</div>






