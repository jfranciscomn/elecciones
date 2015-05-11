<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "vehiculo".
 *
 * @property integer $vehiculo_id
 * @property integer $incidente_id
 * @property integer $estado_vehiculo_id
 * @property integer $gama_vehiculo_id
 * @property integer $marca_vehiculo_id
 * @property string $placas
 * @property string $modelo
 * @property string $numero_serie
 */
class Vehiculo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'vehiculo';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['incidente_id', 'estado_vehiculo_id', 'gama_vehiculo_id', 'marca_vehiculo_id', 'placas', 'modelo', 'numero_serie'], 'required'],
            [['incidente_id', 'estado_vehiculo_id', 'gama_vehiculo_id', 'marca_vehiculo_id'], 'integer'],
            [['placas', 'modelo', 'numero_serie'], 'string', 'max' => 145]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'vehiculo_id' => 'Vehiculo ID',
            'incidente_id' => 'Incidente ID',
            'estado_vehiculo_id' => 'Estado Vehiculo ID',
            'gama_vehiculo_id' => 'Gama Vehiculo ID',
            'marca_vehiculo_id' => 'Marca Vehiculo ID',
            'placas' => 'Placas',
            'modelo' => 'Modelo',
            'numero_serie' => 'Numero Serie',
        ];
    }
}
