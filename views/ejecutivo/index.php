
<?php
	/* @var $this yii\web\View */
	use miloschuman\highcharts\Highcharts;
	use yii\web\JsExpression;
	use yii\bootstrap\Modal;
	use yii\helpers\Url;
	use yii\helpers\Html;
	$this->title = 'Incidentes';
?>
<div style='text-align:center'>
	<h1>Elecciones 2015</h1>
	<?= Html::a('Listado',['lista']); ?>
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
						                				$("#distrito_modal").modal("show");
						                				$("#distrito_label").html("Cargando");
        												$("#distrito_contenido").html(\'<div class="progress"><div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%"></div></div>\');
						                				$("#distrito_label").html(e.point.name);
						                				
						                				$.ajax({
                                                                url: "'.Url::to(['ejecutivo/incidente-distrito-modal']).'",
                                                                
                                                                data: {nombre_distrito: e.point.name,tipo:"distrito",incidente_estado:"POSITIVO"},
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
						                				$("#distrito_modal").modal("show");
						                				$("#distrito_label").html("Cargando");
        												$("#distrito_contenido").html(\'<div class="progress"><div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%"></div></div>\');
						                				$("#distrito_label").html(e.point.name);
						                				
						                				$.ajax({
                                                                url: "'.Url::to(['ejecutivo/incidente-tipo-modal']).'",
                                                                
                                                                data: {subclase_nombre: e.point.name,tipo:"tipo",incidente_estado:"POSITIVO"},
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

<div class="row" style='text-align:center;' >
  <div class="col-md-6">
                    	<?=
						   Highcharts::widget([
						    'options' => [
						        'title' => ['text' => 'Incidencia por Estatus'],
						        'plotOptions' => [
						            'pie' => [
						                'cursor' => 'pointer',
						            ],
						        ],
						        'series' => [
						            [ // new opening bracket
						                'type' => 'pie',
						                'name' => 'Incidentes',
						                'data' => $estados,
						                'events'=> [
						                		'click'=>new JsExpression(' function(e)  {
						                				
						                				

						                				$("#distrito_modal").modal("show");
						                				$("#distrito_label").html("Cargando");
        												$("#distrito_contenido").html(\'<div class="progress"><div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%"></div></div>\');
						                				$("#distrito_label").html(e.point.name);
						                				$.ajax({
                                                                url: "'.Url::to(['ejecutivo/incidente-estado-modal']).'",
                                                                
                                                                data: {incidente_estado: e.point.name},
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
  <div class="col-xs-6">
    	<h3> Mapa de Distritos Electorales </h3>
    	<br/>
      <img src="http://10.10.1.182/elecciones/img/mapa.jpg" alt="Mapa">
    
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


