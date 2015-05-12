<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "incidente".
 *
 * @property integer $incidente_id
 * @property integer $colonia_id
 * @property integer $poblacion_id
 * @property integer $sindicatura_id
 * @property integer $municipio_id
 * @property integer $operativo_id
 * @property integer $subclase2_incidente_id
 * @property integer $subclase_incidente_id
 * @property integer $clase_incidente_id
 * @property string $fecha
 * @property integer $usuario_id
 *
 * @property Colonia $colonia
 * @property Poblacion $poblacion
 * @property Sindicatura $sindicatura
 * @property Municipio $municipio
 * @property Operativo $operativo
 * @property Subclase2Incidente $subclase2Incidente
 * @property SubclaseIncidente $subclaseIncidente
 * @property ClaseIncidente $claseIncidente
 * @property Usuario $usuario
 * @property IncidenteHasCorporacion[] $incidenteHasCorporacions
 * @property Corporacion[] $corporacions
 * @property Persona[] $personas
 * @property Vehiculo[] $vehiculos
 */
class Incidente extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'incidente';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['colonia_id', 'poblacion_id', 'sindicatura_id', 'municipio_id', 'operativo_id', 'subclase2_incidente_id', 'subclase_incidente_id', 'clase_incidente_id', 'usuario_id'], 'integer'],
            [['municipio_id', 'operativo_id', 'clase_incidente_id', 'fecha', 'usuario_id'], 'required'],
            [['fecha'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'incidente_id' => 'Incidente ID',
            'colonia_id' => 'Colonia ID',
            'poblacion_id' => 'Poblacion ID',
            'sindicatura_id' => 'Sindicatura ID',
            'municipio_id' => 'Municipio ID',
            'operativo_id' => 'Operativo ID',
            'subclase2_incidente_id' => 'Subclase2 Incidente ID',
            'subclase_incidente_id' => 'Subclase Incidente ID',
            'clase_incidente_id' => 'Clase Incidente ID',
            'fecha' => 'Fecha',
            'usuario_id' => 'Usuario ID',
        ];
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

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOperativo()
    {
        return $this->hasOne(Operativo::className(), ['operativo_id' => 'operativo_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSubclase2Incidente()
    {
        return $this->hasOne(Subclase2Incidente::className(), ['subclase2_incidente_id' => 'subclase2_incidente_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSubclaseIncidente()
    {
        return $this->hasOne(SubclaseIncidente::className(), ['subclase_incidente_id' => 'subclase_incidente_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getClaseIncidente()
    {
        return $this->hasOne(ClaseIncidente::className(), ['clase_incidente_id' => 'clase_incidente_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsuario()
    {
        return $this->hasOne(Usuario::className(), ['usuario_id' => 'usuario_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIncidenteHasCorporacions()
    {
        return $this->hasMany(IncidenteHasCorporacion::className(), ['incidente_id' => 'incidente_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCorporacions()
    {
        return $this->hasMany(Corporacion::className(), ['corporacion_id' => 'corporacion_id'])->viaTable('incidente_has_corporacion', ['incidente_id' => 'incidente_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPersonas()
    {
        return $this->hasMany(Persona::className(), ['incidente_id' => 'incidente_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVehiculos()
    {
        return $this->hasMany(Vehiculo::className(), ['incidente_id' => 'incidente_id']);
    }
}
