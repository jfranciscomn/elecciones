
<?php
	/* @var $this yii\web\View */
	use miloschuman\highcharts\Highcharts;
	use yii\web\JsExpression;
	use yii\bootstrap\Modal;
	use yii\helpers\Url;

?>
<div style='text-align:center'>
	<h1>Elecciones 2015</h1>
</div>

 			<div class="container-fluid">
                <div class="row">
                    <div class="col-md-5">
                    	<?=
						   Highcharts::widget([
						    'options' => [
						        'title' => ['text' => 'Incidencia por Distrito'],
						        'plotOptions' => [
						            'pie' => [
						                'cursor' => 'pointer',
						            ],
						        ],
						        'series' => [
						            [ // new opening bracket
						                'type' => 'pie',
						                'name' => 'Incidentes',
						                'data' => $distritos,
						                'events'=> [
						                		'click'=>new JsExpression(' function(e)  {
						                				$("#distrito_label").html(e.point.name);
						                				$("#distrito_modal").modal("show");
						                				$.ajax({
                                                                url: "'.Url::to(['ejecutivo/incidente-distrito-modal']).'",
                                                                
                                                                data: {nombre_distrito: e.point.name},
                                                                success: function(data){
                                                                  $("#distrito_contenido").html(data);
                                                                }
                                                            });

						                			}')
						                	]
						            ] // new closing bracket
						        ],
						     
						    ],
						]); ?>
					</div>
					<div class="col-md-7">
                    	<?=
						   Highcharts::widget([
						    'options' => [
						        'title' => ['text' => 'Incidencia por Catalogo'],
						        'plotOptions' => [
						            'pie' => [
						                'cursor' => 'pointer',
						            ],
						        ],
						        'series' => [
						            [ // new opening bracket
						                'type' => 'pie',
						                'name' => 'Incidentes',
						                'data' => $tipos,
						                'events'=> [
						                		'click'=>new JsExpression(' function(e)  {
						                				$("#distrito_label").html(e.point.name);
						                				$("#distrito_modal").modal("show");
						                				$.ajax({
                                                                url: "'.Url::to(['ejecutivo/incidente-tipo-modal']).'",
                                                                
                                                                data: {subclase_nombre: e.point.name},
                                                                success: function(data){
                                                                  $("#distrito_contenido").html(data);
                                                                }
                                                            });

						                			}')
						                	]
						            ] // new closing bracket
						        ],
						    ],
						]); ?>
					</div>
				</div>
			</div>



<?php
Modal::begin([	
	'id'=>'distrito_modal',
    'header' => '<strong id="distrito_label">Hello world</strong>',
    'size'=>Modal::SIZE_LARGE
   
]);
\yii\widgets\Pjax::begin([
        'enablePushState'=>FALSE
    ]); 
echo '<div id="distrito_contenido"></div>';
\yii\widgets\Pjax::end();
Modal::end();

?>