<?php

namespace app\controllers;

use Yii;
use app\models\Grupo;
use app\models\Accion;
use app\models\Usuario;

use app\models\AccionHasGrupo;
use app\models\search\GrupoSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * GrupoController implements the CRUD actions for Grupo model.
 */
class GrupoController extends Controller
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
     * Lists all Grupo models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new GrupoSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Grupo model.
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
     * Creates a new Grupo model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Grupo();

        $data =  Accion::find()->joinWith('controlador')->orderBy('controlador.controlador_nombre, accion_nombre')->all();
        $lista_accion =(count($data)==0)? [''=>'']: \yii\helpers\ArrayHelper::map($data, 'accion_id','nombreCompleto'); 

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $model->setAccionesActuales(Yii::$app->request->post());
            foreach ($model->getAccionesActuales() as  $value) {
                $grupo_accion = new AccionHasGrupo();
                $grupo_accion->grupo_id=$model->grupo_id;
                $grupo_accion->accion_id = $value;
                $grupo_accion->save();
            }
            return $this->redirect(['view', 'id' => $model->grupo_id]);
        } else {
            $model->load(Yii::$app->request->post());
            $model->setAccionesActuales(Yii::$app->request->post());
            return $this->render('create', [
                'model' => $model,
                'lista_accion'=>$lista_accion,
            ]);
        }
    }

    /**
     * Updates an existing Grupo model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
         $data =  Accion::find()->joinWith('controlador')->orderBy('controlador.controlador_nombre, accion_nombre')->all();
        $lista_accion =(count($data)==0)? [''=>'']: \yii\helpers\ArrayHelper::map($data, 'accion_id','nombreCompleto'); 

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            
            foreach ($model->accionHasGrupos as $value) {
                $value->delete();
            }
            $model->setAccionesActuales(Yii::$app->request->post());
            foreach ($model->getAccionesActuales() as  $value) {
                $grupo_accion = new AccionHasGrupo();
                $grupo_accion->grupo_id=$model->grupo_id;
                $grupo_accion->accion_id = $value;
                $grupo_accion->save();
            }

            return $this->redirect(['view', 'id' => $model->grupo_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
                'lista_accion'=>$lista_accion,
            ]);
        }
    }

    /**
     * Deletes an existing Grupo model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Grupo model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Grupo the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Grupo::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
