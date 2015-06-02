<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "sindicatura".
 *
 * @property integer $sindicatura_id
 * @property integer $municipio_id
 * @property string $sindicatura_nombre
 *
 * @property Colonia[] $colonias
 * @property Incidente[] $incidentes
 * @property Lugar[] $lugars
 * @property Persona[] $personas
 * @property Poblacion[] $poblacions
 * @property Municipio $municipio
 */
class Sindicatura extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'sindicatura';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['municipio_id', 'sindicatura_nombre'], 'required'],
            [['municipio_id'], 'integer'],
            [['sindicatura_nombre'], 'string', 'max' => 145]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'sindicatura_id' => 'ID Sindicatura',
            'municipio_id' => 'Municipio',
            'sindicatura_nombre' => 'Sindicatura',
            'municipioName' =>'Municipio',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getColonias()
    {
        return $this->hasMany(Colonia::className(), ['sindicatura_id' => 'sindicatura_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIncidentes()
    {
        return $this->hasMany(Incidente::className(), ['sindicatura_id' => 'sindicatura_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLugars()
    {
        return $this->hasMany(Lugar::className(), ['sindicatura_id' => 'sindicatura_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPersonas()
    {
        return $this->hasMany(Persona::className(), ['sindicatura_id' => 'sindicatura_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPoblacions()
    {
        return $this->hasMany(Poblacion::className(), ['sindicatura_id' => 'sindicatura_id']);
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
        return isset($this->municipio->municipio_nombre)?$this->municipio->municipio_nombre:'';
    }
}
