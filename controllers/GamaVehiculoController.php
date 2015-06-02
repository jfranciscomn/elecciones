<?php

namespace app\controllers;

use Yii;
use app\models\GamaVehiculo;
use app\models\MarcaVehiculo;
use app\models\search\GamaVehiculoSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\db\Query;
use yii\helpers\Json;

/**
 * GamaVehiculoController implements the CRUD actions for GamaVehiculo model.
 */
class GamaVehiculoController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all GamaVehiculo models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new GamaVehiculoSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single GamaVehiculo model.
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
     * Creates a new GamaVehiculo model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new GamaVehiculo();
        $data =  MarcaVehiculo::find()->all();
        $marcaVehiculos = (count($data)==0)? [''=>'']: \yii\helpers\ArrayHelper::map($data, 'marca_vehiculo_id','marca_vehiculoco_nombre'); 

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->gama_vehiculo_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
                'marcaVehiculos' => $marcaVehiculos,
            ]);
        }
    }

    /**
     * Updates an existing GamaVehiculo model.
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
            return $this->redirect(['view', 'id' => $model->gama_vehiculo_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
                'marcaVehiculos' => $marcaVehiculos,
            ]);
        }
    }

    /**
     * Deletes an existing GamaVehiculo model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    public function actionAutocompletar($search = null, $marca= null, $id = null) {
        $out = ['more' => false];
        if (!is_null($search)) {
            $query = new Query;
            $query->select('gama_vehiculo_id as id, gama_vehiculo_nombre AS text')
                ->from('gama_vehiculo')
                ->where('gama_vehiculo_nombre LIKE "%' . $search .'%"'.' and marca_vehiculo_id = '.(empty($marca)? 0:$marca))
                ->limit(20);
            $command = $query->createCommand();
            $data = $command->queryAll();
            $out['results'] = array_values($data);
        }
        elseif ($id > 0) {
            $out['results'] = ['id' => $id, 'text' => GamaVehiculo::findOne($id)->gama_vehiculo_nombre];
        }
        else {
            $out['results'] = ['id' => 0, 'text' => 'No se encontraron resultado'];
        }
        echo Json::encode($out);
    }

    /**
     * Finds the GamaVehiculo model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return GamaVehiculo the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = GamaVehiculo::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
