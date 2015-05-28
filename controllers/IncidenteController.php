<?php

namespace app\controllers;

use Yii;
use app\models\Incidente;
use app\models\Municipio;
use app\models\Operativo;
use app\models\Persona;
use app\models\ClaseIncidente;
use app\models\Usuario;
use app\models\search\IncidenteSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Url;

/**
 * IncidenteController implements the CRUD actions for Incidente model.
 */
class IncidenteController extends Controller
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
     * Lists all Incidente models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new IncidenteSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Incidente model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($incidente_id)
    {
        Url::remember();
        return $this->render('view', [
            'model' => $this->findModel($incidente_id),
        ]);
    }

    /**
     * Creates a new Incidente model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Incidente();
        $model2 = new Persona();
        $data =  Municipio::find()->all();
        $municipios = (count($data)==0)? [''=>'']: \yii\helpers\ArrayHelper::map($data, 'municipio_id','municipio_nombre'); 

        $data =  Operativo::find()->all();
        $operativos = (count($data)==0)? [''=>'']: \yii\helpers\ArrayHelper::map($data, 'operativo_id','operativo_nombre'); 

        $data =  ClaseIncidente::find()->all();
        $claseIncidente = (count($data)==0)? [''=>'']: \yii\helpers\ArrayHelper::map($data, 'clase_incidente_id','clase_incidente_nombre'); 

        $model->usuario_id =Yii::$app->user->identity->id;
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'incidente_id' => $model->incidente_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
                'model2' => $model2,
                'municipios'=>$municipios,
                'operativos'=>$operativos,
                'claseIncidente'=>$claseIncidente,
            ]);
        }
    }

    /**
     * Updates an existing Incidente model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */

    /**
     * Deletes an existing Incidente model.
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
     * Finds the Incidente model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Incidente the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Incidente::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
