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
 * @property integer $colonia_colonia_id
 * @property integer $poblacion_poblacion_id
 * @property integer $sindicatura_sindicatura_id
 * @property integer $municipio_municipio_id
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
            [['incidente_id', 'estado_persona_id', 'edad', 'sexo', 'colonia_colonia_id', 'poblacion_poblacion_id', 'sindicatura_sindicatura_id', 'municipio_municipio_id'], 'integer'],
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
            'estado_persona_id' => 'Estado Persona ID',
            'persona_nombre' => 'Persona Nombre',
            'edad' => 'Edad',
            'sexo' => 'Sexo',
            'domicilio' => 'Domicilio',
            'colonia_colonia_id' => 'Colonia Colonia ID',
            'poblacion_poblacion_id' => 'Poblacion Poblacion ID',
            'sindicatura_sindicatura_id' => 'Sindicatura Sindicatura ID',
            'municipio_municipio_id' => 'Municipio Municipio ID',
        ];
    }
}
