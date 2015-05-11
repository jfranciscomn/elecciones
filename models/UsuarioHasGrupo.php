<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "usuario_has_grupo".
 *
 * @property integer $usuario_id
 * @property integer $grupo_id
 *
 * @property Usuario $usuario
 * @property Grupo $grupo
 */
class UsuarioHasGrupo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'usuario_has_grupo';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['usuario_id', 'grupo_id'], 'required'],
            [['usuario_id', 'grupo_id'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'usuario_id' => 'Usuario ID',
            'grupo_id' => 'Grupo ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsuario()
    {
        return $this->hasOne(Usuario::className(), ['usuario_id' => 'usuario_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGrupo()
    {
        return $this->hasOne(Grupo::className(), ['grupo_id' => 'grupo_id']);
    }
}
