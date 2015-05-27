<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "subclase_incidente".
 *
 * @property integer $subclase_incidente_id
 * @property integer $clase_incidente_id
 * @property string $subclase_incidente_nombre
 *
 * @property Incidente[] $incidentes
 * @property Subclase2Incidente[] $subclase2Incidentes
 * @property ClaseIncidente $claseIncidente
 */
class SubclaseIncidente extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'subclase_incidente';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['clase_incidente_id', 'subclase_incidente_nombre'], 'required'],
            [['clase_incidente_id'], 'integer'],
            [['subclase_incidente_nombre'], 'string', 'max' => 145]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'subclase_incidente_id' => 'Subclase Incidente ID',
            'clase_incidente_id' => 'Clase de Incidente',
            'subclase_incidente_nombre' => 'Nombre de subclase',
            'claseName' => 'Incidente', 
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIncidentes()
    {
        return $this->hasMany(Incidente::className(), ['subclase_incidente_id' => 'subclase_incidente_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSubclase2Incidentes()
    {
        return $this->hasMany(Subclase2Incidente::className(), ['subclase_incidente_id' => 'subclase_incidente_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getClaseIncidente()
    {
        return $this->hasOne(ClaseIncidente::className(), ['clase_incidente_id' => 'clase_incidente_id']);
    }

    public function getClaseName ()
    {
        return $this->claseIncidente->clase_incidente_nombre;
    }
}
