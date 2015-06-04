<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Usuario */

$this->title = $model->username;
$this->params['breadcrumbs'][] = ['label' => 'Usuarios', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="usuario-view">
    <table class="table table-striped table-bordered detail-view">
        <tr>
            <th>
                Usuario
            </th>
            <td>
                <?= $model->username ?>
            </td>
        </tr>
        <tr>
            <th>
                Super Usuario
            </th>
            <td>
                <?= $model->superuser? 'Si':'No' ?>
            </td>
        </tr>
        <tr>
            <th>
                Ejecutivo
            </th>
            <td>
                <?= $model->ejecutivo? 'Si':'No' ?>
            </td>
        </tr>
        <tr>
            <th>
                Nombre
            </th>
            <td>
                <?= $model->usuario_nombre ?>
            </td>
        </tr>
        <tr>
            <th>
                Correo
            </th>
            <td>
                <?= $model->correo ?>
            </td>
        </tr>
        <tr>
            <th>
                Grupos
            </th>
            <td>
               <?php
                    foreach ($model->grupos as $value) {
                        echo  $value->grupo_nombre.' ; ';
                        
                    }
                ?>
            </td>
        </tr>
        <tr>
            <th>
                Activo
            </th>
            <td>
                <?= $model->activo? 'Si':'No' ?>
            </td>
        </tr>
    </table>
                
    

</div>
