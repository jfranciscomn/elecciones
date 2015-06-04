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
					return Html::a('label','#', [
										'class'=>'btn btn-primary', 
										'onclick'=>"clickDetalle($data->incidente_id,$data->distrito_id)"
										]);
				  },
				    ]
        ]
    ]);


$this->registerJs('
	function clickDetalle(incidente_id,distrito_id){
		$.ajax({
            url: "'.Url::to(['ejecutivo/detalle-incidente']).'",
            
            data: {incidente_id: incidente_id,distrito_id:distrito_id},
            success: function(data){

            	 $("#distrito_label").html("Incidente Detalle");
	              $("#distrito_contenido").html(data);
	            }
	    });
	}

	');
?>
