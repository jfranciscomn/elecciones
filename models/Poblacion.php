<?php

namespace app\models;
use app\models\Municipio;
use app\models\Sindicatura;
use Yii;

/**
 * This is the model class for table "poblacion".
 *
 * @property integer $poblacion_id
 * @property integer $sindicatura_id
 * @property integer $municipio_id
 * @property string $poblacion_nombre
 *
 * @property Colonia[] $colonias
 * @property Incidente[] $incidentes
 * @property Lugar[] $lugars
 * @property Persona[] $personas
 * @property Sindicatura $sindicatura
 * @property Municipio $municipio
 */
class Poblacion extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'poblacion';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['sindicatura_id', 'municipio_id'], 'integer'],
            [['municipio_id', 'poblacion_nombre'], 'required'],
            [['poblacion_nombre'], 'string', 'max' => 145]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'poblacion_id' => 'ID Poblacion',
            'sindicatura_id' => 'Sindicatura',
            'municipio_id' => 'Municipio',
            'poblacion_nombre' =>'Poblacion',
            'municipioName' =>'Municipio',
            'sindicaturaName'=>'Sindicatura',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getColonias()
    {
        return $this->hasMany(Colonia::className(), ['poblacion_id' => 'poblacion_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIncidentes()
    {
        return $this->hasMany(Incidente::className(), ['poblacion_id' => 'poblacion_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLugars()
    {
        return $this->hasMany(Lugar::className(), ['poblacion_id' => 'poblacion_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPersonas()
    {
        return $this->hasMany(Persona::className(), ['poblacion_id' => 'poblacion_id']);
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

    public function getMunicipioName()
    {
        return $this->municipio->municipio_nombre;
    }

    public function getSindicaturaName()
    {
        return $this->sindicatura->sindicatura_nombre;
    }
}
