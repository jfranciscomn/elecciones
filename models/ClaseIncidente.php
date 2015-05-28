<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "clase_incidente".
 *
 * @property integer $clase_incidente_id
 * @property string $clase_incidente_nombre
 *
 * @property Incidente[] $incidentes
 * @property Subclase2Incidente[] $subclase2Incidentes
 * @property SubclaseIncidente[] $subclaseIncidentes
 */
class ClaseIncidente extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'clase_incidente';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['clase_incidente_nombre'], 'required'],
            [['clase_incidente_nombre'], 'string', 'max' => 415]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'clase_incidente_id' => 'ID Clase Incidente',
            'clase_incidente_nombre' => 'Incidente',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIncidentes()
    {
        return $this->hasMany(Incidente::className(), ['clase_incidente_id' => 'clase_incidente_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSubclase2Incidentes()
    {
        return $this->hasMany(Subclase2Incidente::className(), ['clase_incidente_id' => 'clase_incidente_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSubclaseIncidentes()
    {
        return $this->hasMany(SubclaseIncidente::className(), ['clase_incidente_id' => 'clase_incidente_id']);
    }
}
