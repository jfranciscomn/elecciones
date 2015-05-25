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
 * @property Municipio $municipio
 * @property Poblacion $poblacion
 * @property Sindicatura $sindicatura
 * @property Incidente[] $incidentes
 * @property Persona[] $personas
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
            'colonia_id' => 'ID Colonia',
            'poblacion_id' => 'Poblacion',
            'sindicatura_id' => 'Sindicatura',
            'municipio_id' => 'Municipio',
            'colonia_nombre' => 'Colonia',
            'municipioName' => 'Municipio',
            'sindicaturaName'=> 'Sindicatura',
            'poblacionName'=> 'Poblacion',

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
    public function getIncidentes()
    {
        return $this->hasMany(Incidente::className(), ['colonia_id' => 'colonia_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPersonas()
    {
        return $this->hasMany(Persona::className(), ['colonia_id' => 'colonia_id']);
    }

    public function getMunicipioName()
    {
        return $this->municipio->municipio_nombre;
    }

    public function getSindicaturaName()
    {
        return $this->sindicatura->sindicatura_nombre;
    }

    public function getPoblacionName()
    {
        return $this->poblacion->poblacion_nombre;
    }
}
