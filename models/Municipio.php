<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "municipio".
 *
 * @property integer $municipio_id
 * @property integer $zona_id
 * @property string $municipio_nombre
 *
 * @property Zona $zona
 */
class Municipio extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'municipio';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['zona_id', 'municipio_nombre'], 'required'],
            [['zona_id'], 'integer'],
            [['municipio_nombre'], 'string', 'max' => 145]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'municipio_id' => 'Municipio',
            'zona_id' => 'Zona',
            'municipio_nombre' => 'Nombre',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getZona()
    {
        return $this->hasOne(Zona::className(), ['zona_id' => 'zona_id']);
    }
}
