<?php

namespace app\controllers;

use Yii;
use app\models\Poblacion;
use app\models\Usuario;
use app\models\Municipio;
use app\models\search\PoblacionSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\db\Query;
use yii\helpers\Json;

/**
 * PoblacionController implements the CRUD actions for Poblacion model.
 */
class PoblacionController extends Controller
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
     * Lists all Poblacion models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PoblacionSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Poblacion model.
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
     * Creates a new Poblacion model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Poblacion();
        $data =  Municipio::find()->all();
        $municipios = (count($data)==0)? [''=>'']: \yii\helpers\ArrayHelper::map($data, 'municipio_id','municipio_nombre'); 
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->poblacion_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
                'municipios'=>$municipios,
            ]);
        }
    }

    /**
     * Updates an existing Poblacion model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $data =  Municipio::find()->all();
        $municipios = (count($data)==0)? [''=>'']: \yii\helpers\ArrayHelper::map($data, 'municipio_id','municipio_nombre'); 

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->poblacion_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
                'municipios'=>$municipios,
            ]);
        }
    }

    public function actionAutocompletar($search = null, $municipio= null, $sindicatura=null, $id = null) {
        $out = ['more' => false];
        if (!is_null($search)) {
            $query = new Query;
            $query->select('sindicatura_id, poblacion_nombre AS text, poblacion_id as id, municipio_id')
                ->from('poblacion')
                ->where('poblacion_nombre LIKE "%' . $search .'%"'.
                    ( empty($municipio)? '' :' and municipio_id = '.$municipio).' '.
                    ( empty($sindicatura)? '' :' and sindicatura_id = '.$sindicatura)
                    )->limit(129);
            $command = $query->createCommand();
            $data = $command->queryAll();
            $out['results'] = array_values($data);
        }
        elseif ($id > 0) {
            $out['results'] = ['id' => $id, 'text' => Poblacion::findOne($id)->poblacion_nombre];
        }
        else {
            $out['results'] = ['id' => 0, 'text' => 'No se encontraron resultados para poblacion'];
        }
        echo Json::encode($out);
    }


    /**
     * Deletes an existing Poblacion model.
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
     * Finds the Poblacion model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Poblacion the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Poblacion::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
