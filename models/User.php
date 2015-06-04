<?php

namespace app\models;

class User extends \yii\base\Object implements \yii\web\IdentityInterface
{
    public $id;
    public $username;
    public $password;
    public $authKey;
    public $superuser;
    public $activo;
    public $accessToken;
    public $ejecutivo;

    public function attributeLabels()
    {
        return [
            'username' => Yii::t('app', 'Usuario'),
            'password' => Yii::t('app', 'Contraseña'),
        ];
    }





    private static function getUsuarioUsername($username)
    {
         if (($model=Usuario::find()->where(['username' => $username])->one()) !== null) {
            $ret =[
                'id'=>$model->usuario_id,
                'username'=>$model->username,
                'password'=>$model->password,
                'superuser'=>$model->superuser,
                'ejecutivo'=>$model->ejecutivo,
                'activo'=>$model->activo,
                'authKey' => 'test'.$model->usuario_id.'key',
                'accessToken' => $model->usuario_id,

            ];

            return $ret;;
        } else {
            return null;
        }
    }

    private static function getUsuario($id)
    {
        if (($model = Usuario::findOne($id)) !== null) {
            $ret =[
                'id'=>$model->usuario_id,
                'username'=>$model->username,
                'password'=>$model->password,
                'superuser'=>$model->superuser,
                'ejecutivo'=>$model->ejecutivo,
                'activo'=>$model->activo,
                'authKey' => 'test'.$model->usuario_id.'key',
                'accessToken' => $model->usuario_id,
            ];

            return $ret;;
        } else {
            return null;
        }

    }

    /**
     * @inheritdoc
     */
    public static function findIdentity($id)
    {
        $usuario=self::getUsuario($id);
        return isset($usuario) ? new static($usuario) : null;
    }

    /**
     * @inheritdoc
     */
    public static function findIdentityByAccessToken($token, $type = null)
     {
        $usuario=self::getUsuario($token);
        return isset($usuario) ? new static($usuario) : null;
    }
    

    /**
     * Finds user by username
     *
     * @param  string      $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        $usuario=self::getUsuarioUsername($username);
        return isset($usuario) ? new static($usuario) : null;
    }

    /**
     * @inheritdoc
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @inheritdoc
     */
    public function getAuthKey()
    {
        return $this->authKey;
    }

   
    /**
     * @inheritdoc
     */
    public function validateAuthKey($authKey)
    {
        return $this->authKey === $authKey;
    }

    /**
     * Validates password
     *
     * @param  string  $password password to validate
     * @return boolean if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return $this->password === $password;
    }
}
