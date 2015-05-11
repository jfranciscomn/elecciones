<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Bitacora */

$this->title = $model->bitacora_id;
$this->params['breadcrumbs'][] = ['label' => 'Bitacoras', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bitacora-view">

    <h1><?= Html::encode($this->title) ?></h1>

    

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'bitacora_id',
            'fecha',
            'usuario_id',
            'accion_id',
            'datos_enviados:ntext',
            'HTTP_USER_AGENT:ntext',
            'HTTP_HOST',
            'SERVER_PORT',
            'REMOTE_ADDR',
            'REMOTE_PORT',
            'SERVER_PROTOCOL',
            'REQUEST_METHOD',
            'REQUEST_URI',
            'resultado',
        ],
    ]) ?>

</div>
