<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\PersonaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Personas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="persona-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Persona', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'persona_id',
            'incidente_id',
            'estado_persona_id',
            'persona_nombre',
            'edad',
            // 'sexo',
            // 'domicilio',
            // 'colonia_id',
            // 'poblacion_id',
            // 'sindicatura_id',
            // 'municipio_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
