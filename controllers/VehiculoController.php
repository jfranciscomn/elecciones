<?php

namespace app\controllers;

use Yii;
use app\models\Vehiculo;
use app\models\Usuario;
use app\models\MarcaVehiculo;
use app\models\search\VehiculoSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * VehiculoController implements the CRUD actions for Vehiculo model.
 */
class VehiculoController extends Controller
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
     * Lists all Vehiculo models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new VehiculoSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Vehiculo model.
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
     * Creates a new Vehiculo model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Vehiculo();
        $data =  MarcaVehiculo::find()->all();
        $marcaVehiculos = (count($data)==0)? [''=>'']: \yii\helpers\ArrayHelper::map($data, 'marca_vehiculo_id','marca_vehiculoco_nombre'); 

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->vehiculo_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
                'marcaVehiculos'=> $marcaVehiculos,
            ]);
        }
    }

    /**
     * Updates an existing Vehiculo model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $data =  MarcaVehiculo::find()->all();
        $marcaVehiculos = (count($data)==0)? [''=>'']: \yii\helpers\ArrayHelper::map($data, 'marca_vehiculo_id','marca_vehiculoco_nombre'); 

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->vehiculo_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
                'marcaVehiculos'=> $marcaVehiculos,

            ]);
        }
    }

    /**
     * Deletes an existing Vehiculo model.
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
     * Finds the Vehiculo model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Vehiculo the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Vehiculo::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
