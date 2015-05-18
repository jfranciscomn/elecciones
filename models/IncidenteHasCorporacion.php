<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "incidente_has_corporacion".
 *
 * @property integer $incidente_id
 * @property integer $corporacion_id
 *
 * @property Corporacion $corporacion
 * @property Incidente $incidente
 */
class IncidenteHasCorporacion extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'incidente_has_corporacion';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['incidente_id', 'corporacion_id'], 'required'],
            [['incidente_id', 'corporacion_id'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'incidente_id' => 'Incidente ID',
            'corporacion_id' => 'Corporacion ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCorporacion()
    {
        return $this->hasOne(Corporacion::className(), ['corporacion_id' => 'corporacion_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIncidente()
    {
        return $this->hasOne(Incidente::className(), ['incidente_id' => 'incidente_id']);
    }
}
