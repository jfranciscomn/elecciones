<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "marca_vehiculo".
 *
 * @property integer $marca_vehiculo_id
 * @property string $marca_vehiculoco_nombre
 */
class MarcaVehiculo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'marca_vehiculo';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['marca_vehiculoco_nombre'], 'required'],
            [['marca_vehiculoco_nombre'], 'string', 'max' => 145]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'marca_vehiculo_id' => 'Marca Vehiculo ID',
            'marca_vehiculoco_nombre' => 'Marca Vehiculoco Nombre',
        ];
    }
}
