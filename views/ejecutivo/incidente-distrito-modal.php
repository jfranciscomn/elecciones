<?php 
use yii\helpers\Html;
use kartik\grid\GridView;
?>

<?php 
echo GridView::widget([
        'dataProvider' => $dataProvider,        
        'filterModel' => $searchModel,
        'pjax' => true,  
            'pjaxSettings'=>[
        'options'=>[
            'enablePushState'=>false,
            'id'=>'pjax-job-grid',
            'formSelector'=>'ddd',
            'options'=>[
                'id'=>'dsfdfsdf'
            ],
        ],
    ],                                                                   
        'columns' => [     
            'fecha',  
            'municipioName',
            'poblacionName',
            'subclaseName',
        ]
    ]);
?>