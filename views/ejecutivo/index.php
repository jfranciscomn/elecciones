
<?php
	/* @var $this yii\web\View */
	use miloschuman\highcharts\Highcharts;

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
						            ] // new closing bracket
						        ],
						    ],
						]); ?>
					</div>
				</div>
			</div>