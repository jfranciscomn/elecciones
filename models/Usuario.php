<?php

namespace app\models;

use Yii;
use yii\filters\AccessControl;

/**
 * This is the model class for table "usuario".
 *
 * @property integer $usuario_id
 * @property string $username
 * @property string $password
 * @property integer $superuser
 * @property string $usuario_nombre
 * @property string $correo
 *
 * @property Bitacora[] $bitacoras
 * @property UsuarioHasGrupo[] $usuarioHasGrupos
 * @property Grupo[] $grupos
 */
class Usuario extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    private $gruposact = [];
    public static function tableName()
    {
        return 'usuario';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['superuser', 'usuario_nombre'], 'required'],
            [['superuser','activo'], 'integer'],
            [['username', 'password', 'usuario_nombre', 'correo'], 'string', 'max' => 145],
            [['username'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'usuario_id' => 'Usuario ID',
            'username' => 'Usuario',
            'password' => 'Password',
            'superuser' => 'Super Usuario',
            'gruposActuales' => 'Grupos',
            'usuario_nombre' => 'Nombre',
            'correo' => 'Correo',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBitacoras()
    {
        return $this->hasMany(Bitacora::className(), ['usuario_id' => 'usuario_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsuarioHasGrupos()
    {
        return $this->hasMany(UsuarioHasGrupo::className(), ['usuario_id' => 'usuario_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGrupos()
    {
        return $this->hasMany(Grupo::className(), ['grupo_id' => 'grupo_id'])->viaTable('usuario_has_grupo', ['usuario_id' => 'usuario_id']);
    }
    public function getGruposActuales()
    {

        if(empty($this->gruposact) && !empty($this->usuario_id) )
        {
            
            foreach ($this->grupos as $value) {
                $this->gruposact[]=$value->grupo_id;
                
            }
        }
        
        
        return $this->gruposact;
       
    }
    public function setGruposActuales($data)
    {
        
        if(!empty($data) && !empty($data['Usuario']) && !empty($data['Usuario']['gruposActuales']))
            $this->gruposact= $data['Usuario']['gruposActuales'];
    }


    public static function permisos($controller_id)
    {
        $controlador=Controlador::find()->where(['controlador_nombre'=>$controller_id])->one();
        $connection = Yii::$app->db;
        $usuario_id = Yii::$app->user->isGuest ? '':Yii::$app->user->identity->username;
        
        $model = $connection->createCommand("
                                    select distinct a.accion_id,lower(substring(a.accion_nombre,7)) as accion_nombre 
                                    from accion a
                                    inner join accion_has_grupo ag on a.accion_id = ag.accion_id
                                    inner join Grupo g on g.grupo_id = ag.grupo_id
                                    inner join usuario_has_grupo ug on ug.grupo_id = g.grupo_id
                                    inner join usuario u on u.usuario_id = ug.usuario_id
                                    where u.username = '$usuario_id ' and a.controlador_id=".$controlador->controlador_id);
        $users = $model->queryAll();
        
        $acciones=[];
        foreach ($controlador->acciones as  $value) {
            $acciones[]=strtolower(substr($value->accion_nombre,6));
            # code...
        }
        $permiso =[];
        foreach ($users as  $value) {
            $permiso[] = $value['accion_nombre'];
        }

        $denegados=[];
        foreach ($acciones as  $value) {
            if(array_search($value, $permiso)===false )
                $denegados[]=$value;
        }

        $reglas =[];
        if(!Yii::$app->user->isGuest && !Yii::$app->user->identity->activo)
            $reglas[] =['actions' => $denegados,'allow' => false,];
        else if(!Yii::$app->user->isGuest && Yii::$app->user->identity->superuser )
             $reglas[] =['actions' => $denegados,'allow' => true,];
        
        else{
            if(!empty($permiso))
                $reglas[] =['actions' => $permiso,'allow' => true,];
            if(!empty($denegados))
                $reglas[] =['actions' => $denegados,'allow' => false,];
        }

        $ret= [
                'class' => AccessControl::className(),
                'only' => $acciones,
                'rules' =>  $reglas,
            ];
    
        return $ret;
    }
}
