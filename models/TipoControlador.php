<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tipo_controlador".
 *
 * @property integer $tipo_controlador_id
 * @property string $tipo_controlador_nombre
 *
 * @property TipoControladorHasControlador[] $tipoControladorHasControladors
 * @property Controlador[] $controladors
 */
class TipoControlador extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tipo_controlador';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tipo_controlador_nombre'], 'required'],
            [['tipo_controlador_nombre'], 'string', 'max' => 145]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'tipo_controlador_id' => 'Tipo Controlador ID',
            'tipo_controlador_nombre' => 'Tipo Controlador Nombre',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTipoControladorHasControladors()
    {
        return $this->hasMany(TipoControladorHasControlador::className(), ['tipo_controlador_id' => 'tipo_controlador_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getControladores()
    {
        return $this->hasMany(Controlador::className(), ['controlador_id' => 'controlador_id'])->viaTable('tipo_controlador_has_controlador', ['tipo_controlador_id' => 'tipo_controlador_id']);
    }
}
