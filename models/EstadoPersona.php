<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "estado_persona".
 *
 * @property integer $estado_persona_id
 * @property string $estado_persona_nombre
 *
 * @property Persona[] $personas
 */
class EstadoPersona extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'estado_persona';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['estado_persona_nombre'], 'required'],
            [['estado_persona_nombre'], 'string', 'max' => 145]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'estado_persona_id' => 'Estado Persona',
            'estado_persona_nombre' => 'Estado de la persona',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPersonas()
    {
        return $this->hasMany(Persona::className(), ['estado_persona_id' => 'estado_persona_id']);
    }
}
