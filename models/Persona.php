<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "persona".
 *
 * @property integer $persona_id
 * @property integer $incidente_id
 * @property integer $estado_persona_id
 * @property string $persona_nombre
 * @property integer $edad
 * @property integer $sexo
 * @property string $domicilio
 * @property integer $colonia_id
 * @property integer $poblacion_id
 * @property integer $sindicatura_id
 * @property integer $municipio_id
 *
 * @property Incidente $incidente
 * @property EstadoPersona $estadoPersona
 * @property Colonia $colonia
 * @property Poblacion $poblacion
 * @property Sindicatura $sindicatura
 * @property Municipio $municipio
 */
class Persona extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'persona';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['incidente_id', 'estado_persona_id'], 'required'],
            [['incidente_id', 'estado_persona_id', 'edad', 'sexo', 'colonia_id', 'poblacion_id', 'sindicatura_id', 'municipio_id'], 'integer'],
            [['persona_nombre'], 'string', 'max' => 145],
            [['domicilio'], 'string', 'max' => 256]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'persona_id' => 'Persona ID',
            'incidente_id' => 'Incidente ID',
            'estado_persona_id' => 'Estado Persona',
            'persona_nombre' => 'Nombre',
            'edad' => 'Edad',
            'sexo' => 'Sexo',
            'domicilio' => 'Domicilio',
            'colonia_id' => 'Colonia',
            'poblacion_id' => 'Poblacion',
            'sindicatura_id' => 'Sindicatura',
            'municipio_id' => 'Municipio',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIncidente()
    {
        return $this->hasOne(Incidente::className(), ['incidente_id' => 'incidente_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEstadoPersona()
    {
        return $this->hasOne(EstadoPersona::className(), ['estado_persona_id' => 'estado_persona_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getColonia()
    {
        return $this->hasOne(Colonia::className(), ['colonia_id' => 'colonia_id']);
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
