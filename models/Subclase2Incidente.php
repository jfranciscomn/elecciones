<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "subclase2_incidente".
 *
 * @property integer $subclase2_incidente_id
 * @property integer $subclase_incidente_id
 * @property integer $clase_incidente_id
 * @property string $subclase2_incidente_nombre
 *
 * @property Incidente[] $incidentes
 * @property SubclaseIncidente $subclaseIncidente
 * @property ClaseIncidente $claseIncidente
 */
class Subclase2Incidente extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'subclase2_incidente';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['subclase_incidente_id', 'clase_incidente_id'], 'integer'],
            [['clase_incidente_id', 'subclase2_incidente_nombre'], 'required'],
            [['subclase2_incidente_nombre'], 'string', 'max' => 145]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'subclase2_incidente_id' => 'Subclase2 Incidente ID',
            'subclase_incidente_id' => 'Subclase Incidente ID',
            'clase_incidente_id' => 'Clase Incidente ID',
            'subclase2_incidente_nombre' => 'Subclase2 Incidente Nombre',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIncidentes()
    {
        return $this->hasMany(Incidente::className(), ['subclase2_incidente_id' => 'subclase2_incidente_id']);
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
}
