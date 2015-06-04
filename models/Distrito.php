<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "distrito".
 *
 * @property integer $distrito_id
 * @property string $distrito_nombre
 *
 * @property Incidente[] $incidentes
 * @property Lugar[] $lugars
 */
class Distrito extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'distrito';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['distrito_id', 'distrito_nombre'], 'required'],
            [['distrito_id'], 'integer'],
            [['distrito_nombre'], 'string', 'max' => 145]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'distrito_id' => 'Distrito ID',
            'distrito_nombre' => 'Distrito Nombre',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIncidentes()
    {
        return $this->hasMany(Incidente::className(), ['distrito_id' => 'distrito_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLugars()
    {
        return $this->hasMany(Lugar::className(), ['distrito' => 'distrito_id']);
    }
}
