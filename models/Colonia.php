<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "colonia".
 *
 * @property integer $colonia_id
 * @property integer $poblacion_id
 * @property integer $sindicatura_id
 * @property integer $municipio_id
 * @property string $colonia_nombre
 *
 * @property Poblacion $poblacion
 * @property Sindicatura $sindicatura
 * @property Municipio $municipio
 */
class Colonia extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'colonia';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['poblacion_id', 'municipio_id', 'colonia_nombre'], 'required'],
            [['poblacion_id', 'sindicatura_id', 'municipio_id'], 'integer'],
            [['colonia_nombre'], 'string', 'max' => 145]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'colonia_id' => 'Colonia ID',
            'poblacion_id' => 'Poblacion ID',
            'sindicatura_id' => 'Sindicatura ID',
            'municipio_id' => 'Municipio ID',
            'colonia_nombre' => 'Colonia Nombre',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPoblacion()
    {
        return $this->hasOne(Poblacion::className(), ['poblacion_id' => 'poblacion_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSindicatura()
    {
        return $this->hasOne(Sindicatura::className(), ['sindicatura_id' => 'sindicatura_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMunicipio()
    {
        return $this->hasOne(Municipio::className(), ['municipio_id' => 'municipio_id']);
    }
}
