<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "clase_incidente".
 *
 * @property integer $clase_incidente_id
 * @property string $clase_incidente_nombre
 */
class ClaseIncidente extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'clase_incidente';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['clase_incidente_nombre'], 'required'],
            [['clase_incidente_nombre'], 'string', 'max' => 415]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'clase_incidente_id' => 'Clase Incidente ID',
            'clase_incidente_nombre' => 'Clase Incidente Nombre',
        ];
    }
}
