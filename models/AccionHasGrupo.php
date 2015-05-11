<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "accion_has_grupo".
 *
 * @property integer $accion_accion_id
 * @property integer $grupo_grupo_id
 *
 * @property Accion $accionAccion
 * @property Grupo $grupoGrupo
 */
class AccionHasGrupo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'accion_has_grupo';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['accion_id', 'grupo_id'], 'required'],
            [['accion_id', 'grupo_id'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'accion_id' => 'Accion ID',
            'grupo_id' => 'Grupo ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAccionAccion()
    {
        return $this->hasOne(Accion::className(), ['accion_id' => 'accion_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGrupoGrupo()
    {
        return $this->hasOne(Grupo::className(), ['grupo_id' => 'grupo_id']);
    }
}
