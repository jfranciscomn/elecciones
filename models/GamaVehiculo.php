<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "gama_vehiculo".
 *
 * @property integer $gama_vehiculo_id
 * @property integer $marca_vehiculo_id
 * @property string $gama_vehiculo_nombre
 *
 * @property MarcaVehiculo $marcaVehiculo
 * @property Vehiculo[] $vehiculos
 */
class GamaVehiculo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'gama_vehiculo';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['marca_vehiculo_id', 'gama_vehiculo_nombre'], 'required'],
            [['marca_vehiculo_id'], 'integer'],
            [['gama_vehiculo_nombre'], 'string', 'max' => 145]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'gama_vehiculo_id' => 'Gama Vehiculo',
            'marca_vehiculo_id' => 'Marca',
            'gama_vehiculo_nombre' => 'Gama',
            'marcaName' => 'Marca',
        ];
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
    public function getVehiculos()
    {
        return $this->hasMany(Vehiculo::className(), ['gama_vehiculo_id' => 'gama_vehiculo_id']);
    }

    public function getMarcaName()
    {
        return isset($this->marcaVehiculo->marca_vehiculoco_nombre) ?$this->marcaVehiculo->marca_vehiculoco_nombre:'';
    }
}
