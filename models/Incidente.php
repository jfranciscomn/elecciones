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
 * @property string $direccion
 * @property integer $lugar_id
 * @property string $descripcion
 *
 * @property Colonia $colonia
 * @property Subclase2Incidente $subclase2Incidente
 * @property ClaseIncidente $claseIncidente
 * @property Municipio $municipio
 * @property Operativo $operativo
 * @property Poblacion $poblacion
 * @property Sindicatura $sindicatura
 * @property SubclaseIncidente $subclaseIncidente
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
            [['colonia_id', 'poblacion_id', 'sindicatura_id', 'municipio_id', 'operativo_id', 'subclase2_incidente_id', 'subclase_incidente_id', 'clase_incidente_id', 'usuario_id', 'lugar_id','distrito_id'], 'integer'],
            [['municipio_id','poblacion_id', 'operativo_id', 
            'clase_incidente_id', 'usuario_id','subclase_incidente_id', 
            'lugar_id','direccion', 'descripcion','distrito_id'], 'required'],
            [['fecha'], 'safe'],
            [['direccion', 'descripcion'], 'string']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'incidente_id' => '# Incidente',
            'colonia_id' => 'Colonia',
            'distrito_id' => 'Distrito',
            'poblacion_id' => 'Poblacion',
            'sindicatura_id' => 'Sindicatura',
            'municipio_id' => 'Municipio',
            'operativo_id' => 'Operativo',
            'subclase2_incidente_id' => 'Detalle Incidente 2',
            'subclase_incidente_id' => 'Detalle Incidente',
            'clase_incidente_id' => 'Incidente',
            'fecha' => 'Fecha',
            'usuario_id' => 'Usuario',
            'direccion' => 'Direccion',
            'lugar_id' => 'Casilla',
            'descripcion' => 'Descripcion',
            'municipioName' => 'Municipio',
            'sindicaturaName'=> 'Sindicatura',
            'poblacionName'=> 'Poblacion',
            'lugarName'=> 'Casilla',
            'coloniaName'=>'Colonia',
            'claseName'=>'Tipo de Incidente',
            'subclaseName'=> 'Detalle Incidente',
            'subclase2Name'=> 'Detalle 2 Incidente',
            'usuarioName'=> 'Usuario',

        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */

    public function getDistrito() 
    { 
       return $this->hasOne(Distrito::className(), ['distrito_id' => 'distrito_id']); 
    }

    public function getColonia()
    {
        return $this->hasOne(Colonia::className(), ['colonia_id' => 'colonia_id']);
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
    public function getClaseIncidente()
    {
        return $this->hasOne(ClaseIncidente::className(), ['clase_incidente_id' => 'clase_incidente_id']);
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
    public function getSubclaseIncidente()
    {
        return $this->hasOne(SubclaseIncidente::className(), ['subclase_incidente_id' => 'subclase_incidente_id']);
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
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLugar()
    {
        return $this->hasOne(Lugar::className(), ['lugar_id' => 'lugar_id']);
    }

    public function getMunicipioName ()
    {
        return isset($this->municipio->municipio_nombre)? $this->municipio->municipio_nombre:'';
    }

    public function getSindicaturaName()
    {
        
        return isset( $this->sindicatura->sindicatura_nombre)?  $this->sindicatura->sindicatura_nombre:'';
    }

    public function getPoblacionName()
    {
        
        return isset($this->poblacion->poblacion_nombre)? $this->poblacion->poblacion_nombre:'';
    }

    public function getColoniaName()
    {
        
        return isset($this->colonia->colonia_nombre)? $this->colonia->colonia_nombre:'';
    }

    public function getClaseName()
    {
        return isset($this->claseIncidente->clase_incidente_nombre)? $this->claseIncidente->clase_incidente_nombre:'';
    }

    public function getlugarName()
    {
        return isset($this->lugar->lugar_nombre)? $this->lugar->lugar_nombre:'';
    }

    public function getSubclaseName()
    {
        return isset($this->subclaseIncidente->subclase_incidente_nombre)? $this->subclaseIncidente->subclase_incidente_nombre:'';
    }

    public function getSubclase2Name()
    {
        return isset($this->subclase2Incidente->subclase2_incidente_nombre)? $this->subclase2Incidente->subclase2_incidente_nombre:'';
    }

    public function getUsuarioName()
    {
        return $this->usuario->usuario_nombre;
    }




}
