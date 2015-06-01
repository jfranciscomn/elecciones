<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tipo_corporacion".
 *
 * @property integer $tipo_corporacion_id
 * @property string $tipo_corporacion_nombre
 *
 * @property Corporacion[] $corporacions
 */
class TipoCorporacion extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tipo_corporacion';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tipo_corporacion_nombre'], 'required'],
            [['tipo_corporacion_nombre'], 'string', 'max' => 145]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'tipo_corporacion_id' => 'Tipo Corporacion ID',
            'tipo_corporacion_nombre' => 'Tipo de Corporacion',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCorporacions()
    {
        return $this->hasMany(Corporacion::className(), ['tipo_corporacion_id' => 'tipo_corporacion_id']);
    }
}
