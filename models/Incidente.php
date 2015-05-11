<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "incidente".
 *
 * @property integer $incidente_id
 * @property integer $colonia_id
 * @property integer $poblacion_id
 * @property integer $sindicatura_id
 * @property integer $municipio_id
 * @property integer $operativo_id
 * @property integer $subclase2_incidente_id
 * @property integer $subclase_incidente_id
 * @property integer $clase_incidente_id
 * @property string $fecha
 * @property integer $usuario_usuario_id
 */
class Incidente extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'incidente';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['colonia_id', 'poblacion_id', 'sindicatura_id', 'municipio_id', 'operativo_id', 'subclase2_incidente_id', 'subclase_incidente_id', 'clase_incidente_id', 'usuario_usuario_id'], 'integer'],
            [['poblacion_id', 'municipio_id', 'operativo_id', 'clase_incidente_id', 'fecha', 'usuario_usuario_id'], 'required'],
            [['fecha'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'incidente_id' => 'Incidente ID',
            'colonia_id' => 'Colonia ID',
            'poblacion_id' => 'Poblacion ID',
            'sindicatura_id' => 'Sindicatura ID',
            'municipio_id' => 'Municipio ID',
            'operativo_id' => 'Operativo ID',
            'subclase2_incidente_id' => 'Subclase2 Incidente ID',
            'subclase_incidente_id' => 'Subclase Incidente ID',
            'clase_incidente_id' => 'Clase Incidente ID',
            'fecha' => 'Fecha',
            'usuario_usuario_id' => 'Usuario Usuario ID',
        ];
    }
}
