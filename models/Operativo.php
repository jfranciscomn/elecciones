<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "operativo".
 *
 * @property integer $operativo_id
 * @property string $operativo_nombre
 * @property string $fecha_inicio
 * @property string $fecha_fin
 * @property integer $activo
 *
 * @property Incidente[] $incidentes
 */
class Operativo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'operativo';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['operativo_nombre', 'fecha_inicio'], 'required'],
            [['fecha_inicio', 'fecha_fin'], 'safe'],
            [['activo'], 'integer'],
            [['operativo_nombre'], 'string', 'max' => 145]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'operativo_id' => 'Operativo ID',
            'operativo_nombre' => 'Operativo Nombre',
            'fecha_inicio' => 'Fecha Inicio',
            'fecha_fin' => 'Fecha Fin',
            'activo' => 'Activo',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIncidentes()
    {
        return $this->hasMany(Incidente::className(), ['operativo_id' => 'operativo_id']);
    }
}
