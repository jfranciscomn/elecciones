<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "seguimiento".
 *
 * @property integer $seguimiento_id
 * @property string $fecha
 * @property string $descripcion
 * @property integer $corporacion_id
 * @property integer $incidente_id
 *
 * @property Corporacion $corporacion
 * @property Incidente $incidente
 */
class Seguimiento extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'seguimiento';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fecha'], 'safe'],
            [['descripcion', 'corporacion_id', 'incidente_id'], 'required'],
            [['descripcion'], 'string'],
            [['corporacion_id', 'incidente_id'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'seguimiento_id' => 'Seguimiento ID',
            'fecha' => 'Fecha',
            'descripcion' => 'Descripcion',
            'corporacion_id' => 'Corporacion ID',
            'incidente_id' => 'Incidente ID',
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
