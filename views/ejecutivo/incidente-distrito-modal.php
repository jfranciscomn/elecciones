<?php 
use yii\helpers\Html;
use yii\grid\GridView;
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
        ]
    ]);
?>