<?php

namespace app\controllers;

use Yii;
use app\models\Bitacora;
use app\models\Usuario;
use app\models\Controlador;
use app\models\Accion;
use app\models\search\BitacoraSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * BitacoraController implements the CRUD actions for Bitacora model.
 */
class BitacoraController extends Controller
{
    public function behaviors()
    {
        return [
            'rules' => Usuario::permisos(Yii::$app->controller->id),
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Bitacora models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new BitacoraSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);


        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Bitacora model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Bitacora model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    

    /**
     * Updates an existing Bitacora model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */

    /**
     * Deletes an existing Bitacora model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    

    /**
     * Finds the Bitacora model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Bitacora the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Bitacora::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public static function registrar($action)
    {
        $nombreaccion = null;
        $nombreControlador = null;
        $controlador = null;
        $accion = null;

        if(!empty($action->actionMethod))
            $nombreaccion = $action->actionMethod;
        if(!empty($action->controller->id))
            $nombreControlador=$action->controller->id;

        if(!empty($nombreControlador))
            $controlador = Controlador::find()->where(['controlador_nombre' => $nombreControlador])->one();
        if(!empty($nombreaccion))
        {
            if(empty($controlador))
            {
                
                $controlador= new Controlador();
                $controlador->controlador_nombre= $nombreControlador;
                $controlador->save();
            }
            $accion = Accion::find()->where(['accion_nombre' => $nombreaccion,'controlador_id'=>$controlador->controlador_id])->one();
            if(empty($accion))
            {
                
                $accion = new Accion();
                $accion->accion_nombre=$nombreaccion;
                $accion->controlador_id = $controlador->controlador_id;
                $accion->save();
            }
        }
        
        

        $registro = new Bitacora();
        $datos=[];
        $datos['GET']=$_GET;
        $datos['POST']=$_POST;
        
        if(!empty($accion))
            $registro->accion_id=$accion->accion_id;
        $registro->HTTP_USER_AGENT = $_SERVER['HTTP_USER_AGENT'];
        $registro->HTTP_HOST = $_SERVER['HTTP_HOST'];
        $registro->SERVER_PORT = $_SERVER['SERVER_PORT'];
        $registro->REMOTE_ADDR = $_SERVER['REMOTE_ADDR'];
        $registro->REMOTE_PORT = $_SERVER['REMOTE_PORT'];
        $registro->SERVER_PROTOCOL = $_SERVER['SERVER_PROTOCOL'];
        $registro->REQUEST_METHOD = $_SERVER['REQUEST_METHOD'];
        $registro->REQUEST_URI = $_SERVER['REQUEST_URI'];
        $registro->datos_enviados =\yii\helpers\Json::encode( $datos);
   
        if(!Yii::$app->user->isGuest)
            $registro->usuario_id=Yii::$app->user->identity->id;
      //  $registro->fecha = str(new \DateTime('now'));
        //$registro->REQUEST_URI = $_SERVER['REQUEST_URI'];
        //$registro->accion_id f09e:630f:493b  7945 Penal de mochis
        $registro->save();
        //print_r($registro);
        

    }
}

