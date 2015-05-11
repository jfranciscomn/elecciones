<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "lugar".
 *
 * @property integer $lugar_id
 * @property integer $tipo_lugar_id
 * @property integer $poblacion_id
 * @property integer $sindicatura_id
 * @property integer $municipio_id
 * @property string $lugar_nombre
 * @property integer $colonia_id
 * @property string $direccion
 *
 * @property Municipio $municipio
 * @property Poblacion $poblacion
 * @property Sindicatura $sindicatura
 * @property TipoLugar $tipoLugar
 */
class Lugar extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'lugar';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tipo_lugar_id', 'municipio_id', 'lugar_nombre'], 'required'],
            [['tipo_lugar_id', 'poblacion_id', 'sindicatura_id', 'municipio_id', 'colonia_id'], 'integer'],
            [['lugar_nombre', 'direccion'], 'string', 'max' => 256]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'lugar_id' => 'Lugar ID',
            'tipo_lugar_id' => 'Tipo Lugar ID',
            'poblacion_id' => 'Poblacion ID',
            'sindicatura_id' => 'Sindicatura ID',
            'municipio_id' => 'Municipio ID',
            'lugar_nombre' => 'Lugar Nombre',
            'colonia_id' => 'Colonia ID',
            'direccion' => 'Direccion',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMunicipio()
    {
        return $this->hasOne(Municipio::className(), ['municipio_id' => 'municipio_id']);
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
    public function getTipoLugar()
    {
        return $this->hasOne(TipoLugar::className(), ['tipo_lugar_id' => 'tipo_lugar_id']);
    }
}
