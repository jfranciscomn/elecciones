<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "municipio".
 *
 * @property integer $municipio_id
 * @property integer $zona_id
 * @property string $municipio_nombre
 *
 * @property Colonia[] $colonias
 * @property Incidente[] $incidentes
 * @property Lugar[] $lugars
 * @property Zona $zona
 * @property Persona[] $personas
 * @property Poblacion[] $poblacions
 * @property Sindicatura[] $sindicaturas
 */
class Municipio extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'municipio';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['zona_id', 'municipio_nombre'], 'required'],
            [['zona_id'], 'integer'],
            [['municipio_nombre'], 'string', 'max' => 145]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'municipio_id' => 'ID Municipio',
            'zona_id' => 'Zona',
            'municipio_nombre' => 'Nombre del Municipio',
            'zonaName'=>'Zona',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getColonias()
    {
        return $this->hasMany(Colonia::className(), ['municipio_id' => 'municipio_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIncidentes()
    {
        return $this->hasMany(Incidente::className(), ['municipio_id' => 'municipio_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLugars()
    {
        return $this->hasMany(Lugar::className(), ['municipio_id' => 'municipio_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getZona()
    {
        return $this->hasOne(Zona::className(), ['zona_id' => 'zona_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPersonas()
    {
        return $this->hasMany(Persona::className(), ['municipio_id' => 'municipio_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPoblacions()
    {
        return $this->hasMany(Poblacion::className(), ['municipio_id' => 'municipio_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSindicaturas()
    {
        return $this->hasMany(Sindicatura::className(), ['municipio_id' => 'municipio_id']);
    }

    public function getzonaName()
    {
        return isset($this->zona->zona_nombre)?$this->zona->zona_nombre:null;
    } 
}
