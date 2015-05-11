<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "grupo".
 *
 * @property integer $grupo_id
 * @property string $grupo_nombre
 *
 * @property AccionHasGrupo[] $accionHasGrupos
 * @property Accion[] $accionAccions
 * @property UsuarioHasGrupo[] $usuarioHasGrupos
 * @property Usuario[] $usuarios
 */
class Grupo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    private $accionesAct=[];
    public static function tableName()
    {
        return 'grupo';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['grupo_nombre'], 'required'],
            [['grupo_nombre'], 'string', 'max' => 145]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'grupo_id' => 'Grupo ID',
            'grupo_nombre' => 'Grupo Nombre',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAccionHasGrupos()
    {
        return $this->hasMany(AccionHasGrupo::className(), ['grupo_id' => 'grupo_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAcciones()
    {
        return $this->hasMany(Accion::className(), ['accion_id' => 'accion_id'])->viaTable('accion_has_grupo', ['grupo_id' => 'grupo_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsuarioHasGrupos()
    {
        return $this->hasMany(UsuarioHasGrupo::className(), ['grupo_id' => 'grupo_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsuarios()
    {
        return $this->hasMany(Usuario::className(), ['usuario_id' => 'usuario_id'])->viaTable('usuario_has_grupo', ['grupo_id' => 'grupo_id']);
    }

    public function getAccionesActuales()
    {

        if(empty($this->accionesAct) && !empty($this->grupo_id) )
        {
            
            foreach ($this->acciones as $value) {
                $this->accionesAct[]=$value->accion_id;
                
            }
        }
        
        
        return $this->accionesAct;
       
    }
    public function setAccionesActuales($data)
    {
        
        if(!empty($data) && !empty($data['Grupo']) && !empty($data['Grupo']['accionesActuales']))
            $this->accionesAct= $data['Grupo']['accionesActuales'];
    }
        
        
        
}
