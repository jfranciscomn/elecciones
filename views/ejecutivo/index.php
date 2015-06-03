<?php
/* @var $this yii\web\View */
use miloschuman\highcharts\Highcharts;

  echo Highcharts::widget([
    'options' => [
        'title' => ['text' => 'Sample title - pie chart'],
        'plotOptions' => [
            'pie' => [
                'cursor' => 'pointer',
            ],
        ],
        'series' => [
            [ // new opening bracket
                'type' => 'pie',
                'name' => 'Elements',
                'data' => [
                    ['Firefox', 45.0],
                    ['IE', 26.8],
                    ['Safari', 8.5],
                    ['Opera', 6.2],
                    ['Others', 0.7]
                ],
            ] // new closing bracket
        ],
    ],
]);

?>
<h1>ejecutivo/index</h1>

<p>
    You may change the content of this page by modifying
    the file <code><?= __FILE__; ?></code>.
</p>

