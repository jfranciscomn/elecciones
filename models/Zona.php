<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "zona".
 *
 * @property integer $zona_id
 * @property string $zona_nombre
 */
class Zona extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'zona';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['zona_nombre'], 'required'],
            [['zona_nombre'], 'string', 'max' => 45]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'zona_id' => 'ID Zona',
            'zona_nombre' => 'Zona',
        ];
    }
}
