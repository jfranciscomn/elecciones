<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "gama_vehiculo".
 *
 * @property integer $gama_vehiculo_id
 * @property integer $marca_vehiculo_id
 * @property string $gama_vehiculo_nombre
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
            'gama_vehiculo_id' => 'Gama Vehiculo ID',
            'marca_vehiculo_id' => 'Marca Vehiculo ID',
            'gama_vehiculo_nombre' => 'Gama Vehiculo Nombre',
        ];
    }
}
