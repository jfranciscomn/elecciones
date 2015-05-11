<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "operativo".
 *
 * @property integer $operativo_id
 * @property string $nombre operativo
 * @property string $fecha_inicio
 * @property string $fecha_fin
 */
class Operativo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'operativo';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nombre operativo', 'fecha_inicio', 'fecha_fin'], 'required'],
            [['fecha_inicio', 'fecha_fin'], 'safe'],
            [['nombre operativo'], 'string', 'max' => 145]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'operativo_id' => 'Operativo ID',
            'nombre operativo' => 'Nombre Operativo',
            'fecha_inicio' => 'Fecha Inicio',
            'fecha_fin' => 'Fecha Fin',
        ];
    }
}
