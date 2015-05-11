<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "bitacora".
 *
 * @property integer $bitacora_id
 * @property string $fecha
 * @property integer $usuario_id
 * @property integer $accion_id
 * @property string $datos_enviados
 * @property string $HTTP_USER_AGENT
 * @property string $HTTP_HOST
 * @property string $SERVER_PORT
 * @property string $REMOTE_ADDR
 * @property string $REMOTE_PORT
 * @property string $SERVER_PROTOCOL
 * @property string $REQUEST_METHOD
 * @property string $REQUEST_URI
 * @property integer $resultado
 *
 * @property Accion $accion
 * @property Usuario $usuario
 */
class Bitacora extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'bitacora';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fecha'], 'safe'],
            [['usuario_id', 'accion_id', 'resultado'], 'integer'],
            [['datos_enviados', 'HTTP_USER_AGENT'], 'string'],
            [['HTTP_HOST', 'SERVER_PORT', 'REMOTE_ADDR', 'REMOTE_PORT', 'SERVER_PROTOCOL', 'REQUEST_METHOD'], 'string', 'max' => 45],
            [['REQUEST_URI'], 'string', 'max' => 145]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'bitacora_id' => 'Bitacora ID',
            'fecha' => 'Fecha',
            'usuario_id' => 'Usuario ID',
            'accion_id' => 'Accion ID',
            'datos_enviados' => 'Datos Enviados',
            'HTTP_USER_AGENT' => 'Http  User  Agent',
            'HTTP_HOST' => 'Http  Host',
            'SERVER_PORT' => 'Server  Port',
            'REMOTE_ADDR' => 'Remote  Addr',
            'REMOTE_PORT' => 'Remote  Port',
            'SERVER_PROTOCOL' => 'Server  Protocol',
            'REQUEST_METHOD' => 'Request  Method',
            'REQUEST_URI' => 'Request  Uri',
            'resultado' => 'Resultado',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAccion()
    {
        return $this->hasOne(Accion::className(), ['accion_id' => 'accion_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsuario()
    {
        return $this->hasOne(Usuario::className(), ['usuario_id' => 'usuario_id']);
    }
}
