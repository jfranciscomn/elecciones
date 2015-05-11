<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "accion".
 *
 * @property integer $accion_id
 * @property integer $controlador_id
 * @property string $accion_nombre
 *
 * @property Controlador $controlador
 * @property AccionHasGrupo[] $accionHasGrupos
 * @property Grupo[] $grupoGrupos
 * @property Bitacora[] $bitacoras
 */
class Accion extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'accion';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['controlador_id'], 'required'],
            [['controlador_id'], 'integer'],
            [['accion_nombre'], 'string', 'max' => 145]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'accion_id' => 'ID',
            'controlador_id' => 'Controlador',
            'accion_nombre' => 'Accion',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getControlador()
    {
        return $this->hasOne(Controlador::className(), ['controlador_id' => 'controlador_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAccionHasGrupos()
    {
        return $this->hasMany(AccionHasGrupo::className(), ['accion_accion_id' => 'accion_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGrupoGrupos()
    {
        return $this->hasMany(Grupo::className(), ['grupo_id' => 'grupo_grupo_id'])->viaTable('accion_has_grupo', ['accion_accion_id' => 'accion_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBitacoras()
    {
        return $this->hasMany(Bitacora::className(), ['accion_id' => 'accion_id']);
    }
    public function getNombreCompleto()
    {
        return $this->controlador->controlador_nombre.': '.$this->accion_nombre;
    }
}
