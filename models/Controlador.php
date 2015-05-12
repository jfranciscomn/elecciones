<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "controlador".
 *
 * @property integer $controlador_id
 * @property string $controlador_nombre
 *
 * @property Accion[] $accions
 * @property TipoControladorHasControlador[] $tipoControladorHasControladors
 * @property TipoControlador[] $tipoControladors
 */
class Controlador extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'controlador';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['controlador_nombre'], 'required'],
            [['controlador_nombre'], 'string', 'max' => 145],
            [['controlador_nombre'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'controlador_id' => 'Controlador ID',
            'controlador_nombre' => 'Controlador Nombre',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAcciones()
    {
        return $this->hasMany(Accion::className(), ['controlador_id' => 'controlador_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTipoControladorHasControladores()
    {
        return $this->hasMany(TipoControladorHasControlador::className(), ['controlador_id' => 'controlador_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTipoControladores()
    {
        return $this->hasMany(TipoControlador::className(), ['tipo_controlador_id' => 'tipo_controlador_id'])->viaTable('tipo_controlador_has_controlador', ['controlador_id' => 'controlador_id']);
    }
}
