<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "estado_vehiculo".
 *
 * @property integer $estado_vehiculo_id
 * @property string $estado_vehiculo_nombre
 *
 * @property Vehiculo[] $vehiculos
 */
class EstadoVehiculo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'estado_vehiculo';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['estado_vehiculo_nombre'], 'required'],
            [['estado_vehiculo_nombre'], 'string', 'max' => 145]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'estado_vehiculo_id' => 'Estado Vehiculo',
            'estado_vehiculo_nombre' => 'Estado del Vehiculo',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVehiculos()
    {
        return $this->hasMany(Vehiculo::className(), ['estado_vehiculo_id' => 'estado_vehiculo_id']);
    }
}
