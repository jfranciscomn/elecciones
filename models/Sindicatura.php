<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "sindicatura".
 *
 * @property integer $sindicatura_id
 * @property integer $municipio_id
 * @property string $sindicatura_nombre
 */
class Sindicatura extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'sindicatura';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['municipio_id', 'sindicatura_nombre'], 'required'],
            [['municipio_id'], 'integer'],
            [['sindicatura_nombre'], 'string', 'max' => 145]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'sindicatura_id' => 'Sindicatura ID',
            'municipio_id' => 'Municipio ID',
            'sindicatura_nombre' => 'Sindicatura Nombre',
        ];
    }
}
