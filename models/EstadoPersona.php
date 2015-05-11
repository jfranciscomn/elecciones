<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "estado_persona".
 *
 * @property integer $estado_persona_id
 * @property string $estado_persona_nombre
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
            'estado_persona_id' => 'Estado Persona ID',
            'estado_persona_nombre' => 'Estado Persona Nombre',
        ];
    }
}
