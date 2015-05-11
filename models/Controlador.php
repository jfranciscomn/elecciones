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
}
