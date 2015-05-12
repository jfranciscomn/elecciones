<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "corporacion".
 *
 * @property integer $corporacion_id
 * @property string $corporacion_nombre
 * @property integer $tipo_corporacion_id
 *
 * @property TipoCorporacion $tipoCorporacion
 * @property IncidenteHasCorporacion[] $incidenteHasCorporacions
 * @property Incidente[] $incidentes
 */
class Corporacion extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'corporacion';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['corporacion_nombre', 'tipo_corporacion_id'], 'required'],
            [['tipo_corporacion_id'], 'integer'],
            [['corporacion_nombre'], 'string', 'max' => 145]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'corporacion_id' => 'Corporacion ID',
            'corporacion_nombre' => 'Corporacion Nombre',
            'tipo_corporacion_id' => 'Tipo Corporacion ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTipoCorporacion()
    {
        return $this->hasOne(TipoCorporacion::className(), ['tipo_corporacion_id' => 'tipo_corporacion_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIncidenteHasCorporacions()
    {
        return $this->hasMany(IncidenteHasCorporacion::className(), ['corporacion_id' => 'corporacion_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIncidentes()
    {
        return $this->hasMany(Incidente::className(), ['incidente_id' => 'incidente_id'])->viaTable('incidente_has_corporacion', ['corporacion_id' => 'corporacion_id']);
    }
}
