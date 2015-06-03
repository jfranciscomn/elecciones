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
 *
 * @property EstadoVehiculo $estadoVehiculo
 * @property GamaVehiculo $gamaVehiculo
 * @property MarcaVehiculo $marcaVehiculo
 * @property Incidente $incidente
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
            [['incidente_id', 'estado_vehiculo_id','gama_vehiculo_id','marca_vehiculo_id','modelo','placas'], 'required'],
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

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEstadoVehiculo()
    {
        return $this->hasOne(EstadoVehiculo::className(), ['estado_vehiculo_id' => 'estado_vehiculo_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGamaVehiculo()
    {
        return $this->hasOne(GamaVehiculo::className(), ['gama_vehiculo_id' => 'gama_vehiculo_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMarcaVehiculo()
    {
        return $this->hasOne(MarcaVehiculo::className(), ['marca_vehiculo_id' => 'marca_vehiculo_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIncidente()
    {
        return $this->hasOne(Incidente::className(), ['incidente_id' => 'incidente_id']);
    }
}
