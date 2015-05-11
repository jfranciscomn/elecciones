<?php

namespace app\controllers;

use Yii;
use app\models\Usuario;
use app\models\Controlador;
use app\models\Grupo;
use app\models\UsuarioHasGrupo;
use app\models\search\UsuarioSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * UsuarioController implements the CRUD actions for Usuario model.
 */
class UsuarioController extends Controller
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
     * Lists all Usuario models.
     * @return mixed
     */


    public function actionIndex()
    {
        $searchModel = new UsuarioSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Usuario model.
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
     * Creates a new Usuario model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {

        $model = new Usuario();

        $data =  Grupo::find()->all();
        $lista_grupo =(count($data)==0)? [''=>'']: \yii\helpers\ArrayHelper::map($data, 'grupo_id','grupo_nombre'); 

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $model->setGruposActuales(Yii::$app->request->post());
            foreach ($model->getGruposActuales() as  $value) {
                $grupo_usuario = new UsuarioHasGrupo();
                $grupo_usuario->usuario_id=$model->usuario_id;
                $grupo_usuario->grupo_id = $value;
                $grupo_usuario->save();
            }
            
            return $this->redirect(['index']);
        } else {
            $model->load(Yii::$app->request->post());
            $model->setGruposActuales(Yii::$app->request->post());
        
  
            return $this->render('create', [
                'model' => $model,
                'lista_grupo' => $lista_grupo,
            ]);
        }
    }

    /**
     * Updates an existing Usuario model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        $data =  Grupo::find()->all();
        $lista_grupo =(count($data)==0)? [''=>'']: \yii\helpers\ArrayHelper::map($data, 'grupo_id','grupo_nombre'); 


        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $model->setGruposActuales(Yii::$app->request->post());
            foreach ($model->usuarioHasGrupos as $value) {
                $value->delete();
            }
            $model->setGruposActuales(Yii::$app->request->post());
            foreach ($model->getGruposActuales() as  $value) {
                $grupo_usuario = new UsuarioHasGrupo();
                $grupo_usuario->usuario_id=$model->usuario_id;
                $grupo_usuario->grupo_id = $value;
                $grupo_usuario->save();
            }

            return $this->redirect(['index']);
        } else {
            return $this->render('update', [
                'model' => $model,
                'lista_grupo' => $lista_grupo,
            ]);
        }
    }

    /**
     * Deletes an existing Usuario model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    /*public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }*/

    /**
     * Finds the Usuario model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Usuario the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Usuario::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
