<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;
use yii\bootstrap\Modal;
use yii\web\View;

/**
* @var yii\web\View $this
* @var yii\data\ActiveDataProvider $dataProvider
* @var app\models\search\IncidenteSearch $searchModel
*/

$this->title = 'Incidentes';
?>
<div style='text-align:center'>
    <h1>Elecciones 2015</h1>
    <?= Html::a('ir a Graficas',['index']); ?>
</div>

<div class="incidente-index">
    <?php //     echo $this->render('_search', ['model' =>$searchModel]);?>
    
    <?php echo GridView::widget([
        'dataProvider' => $dataProvider,        
        'filterModel' => $searchModel,                                                                     
        'columns' => [     
            ['class' => 'yii\grid\SerialColumn'],   

            'fecha',
            'coloniaName',
            'poblacionName',
            
            'municipioName',
            'lugarName',
            'claseName',
            'subclaseName',

            [
                'format' => 'raw',
                'value'=>function ($data) {
                    return Html::a('<span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span>','#', [
                                        //'class'=>'btn btn-primary', 
                                        'onclick'=>"clickDetalle($data->incidente_id)"
                                        ]);
                  },
            ],
        ],
    ]);

    $this->registerJs('
    function clickDetalle(incidente_id){
        var tipo ="";

        $("#distrito_modal").modal("show");
        $("#distrito_label").html("Cargando");
        $("#distrito_contenido").html(\'<div class="progress"><div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%"></div></div>\');

        $.ajax({
            url: "'.Url::to(['ejecutivo/detalle-incidente']).'",
            
            data: {incidente_id: incidente_id},
            success: function(data){

                  $("#distrito_label").html("Incidente Detalle");
                  $("#distrito_contenido").html(data);
                }
        });
    }

    ', View::POS_END);
    ?>
    
</div>




<?php
Modal::begin([  
    'id'=>'distrito_modal',
    'header' => '<strong id="distrito_label">Incidente Detalle</strong>',
    'size'=>Modal::SIZE_LARGE
   
]);
\yii\widgets\Pjax::begin([
        'enablePushState'=>FALSE
    ]); 
echo '<div id="distrito_contenido"></div>';
\yii\widgets\Pjax::end();
Modal::end();

?>


