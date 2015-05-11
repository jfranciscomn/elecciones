<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "subclase_incidente".
 *
 * @property integer $subclase_incidente_id
 * @property integer $clase_incidente_id
 * @property string $subclase_incidente_nombre
 */
class SubclaseIncidente extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'subclase_incidente';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['clase_incidente_id', 'subclase_incidente_nombre'], 'required'],
            [['clase_incidente_id'], 'integer'],
            [['subclase_incidente_nombre'], 'string', 'max' => 145]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'subclase_incidente_id' => 'Subclase Incidente ID',
            'clase_incidente_id' => 'Clase Incidente ID',
            'subclase_incidente_nombre' => 'Subclase Incidente Nombre',
        ];
    }
}
