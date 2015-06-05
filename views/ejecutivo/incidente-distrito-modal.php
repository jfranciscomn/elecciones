<?php 
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;
use kartik\popover\PopoverX;
use yii\web\JsExpression;

?>

<?php 
echo GridView::widget([
        'dataProvider' => $dataProvider,        
        //'filterModel' => $searchModel,
                                                                         
        'columns' => [     
            'fecha',  
            'municipioName',
            'poblacionName',
            'subclaseName',
            [
            	'format' => 'raw',
				'value'=>function ($data) {
					return Html::a('<span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span>','#', [
										//'class'=>'btn btn-primary', 
										'onclick'=>"clickDetalle($data->incidente_id,$data->distrito_id)"
										]);
				  },
				    ]
        ]
    ]);


$this->registerJs('
	function clickDetalle(incidente_id,distrito_id){
        var tipo ="'.$tipo.'";
		$.ajax({
            url: "'.Url::to(['ejecutivo/detalle-incidente']).'",
            
            data: {incidente_id: incidente_id,distrito_id:distrito_id,tipo:tipo},
            success: function(data){

            	  $("#distrito_label").html("Incidente Detalle");
	              $("#distrito_contenido").html(data);
	            }
	    });
	}

	');
?>
