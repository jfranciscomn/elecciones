<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tipo_lugar".
 *
 * @property integer $tipo_lugar_id
 * @property string $tipo_lugar_nombre
 *
 * @property Lugar[] $lugars
 */
class TipoLugar extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tipo_lugar';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tipo_lugar_nombre'], 'required'],
            [['tipo_lugar_nombre'], 'string', 'max' => 145]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'tipo_lugar_id' => 'Tipo Lugar ID',
            'tipo_lugar_nombre' => 'Tipo Lugar Nombre',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLugars()
    {
        return $this->hasMany(Lugar::className(), ['tipo_lugar_id' => 'tipo_lugar_id']);
    }
}
