<?php

namespace app\controllers;

use Yii;
use app\models\Lugar;
use app\models\TipoLugar;
use app\models\Usuario;
use app\models\Municipio;
use app\models\search\LugarSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\db\Query;
use yii\helpers\Json;

/**
 * LugarController implements the CRUD actions for Lugar model.
 */
class LugarController extends Controller
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
     * Lists all Lugar models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new LugarSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Lugar model.
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
     * Creates a new Lugar model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Lugar();
        $data =  Municipio::find()->all();
        $dataTipos= TipoLugar::find()->all();
        $municipios = (count($data)==0)? [''=>'']: \yii\helpers\ArrayHelper::map($data, 'municipio_id','municipio_nombre'); 
        $tipos = (count($dataTipos)==0)? [''=>'']: \yii\helpers\ArrayHelper::map($dataTipos, 'tipo_lugar_id','tipo_lugar_nombre'); 

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->lugar_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
                'municipios' => $municipios,
                'tipos'=> $tipos,
            ]);
        }
    }

    /**
     * Updates an existing Lugar model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $data =  Municipio::find()->all();
        $dataTipos= TipoLugar::find()->all();
        $municipios = (count($data)==0)? [''=>'']: \yii\helpers\ArrayHelper::map($data, 'municipio_id','municipio_nombre'); 
        $tipos = (count($dataTipos)==0)? [''=>'']: \yii\helpers\ArrayHelper::map($dataTipos, 'tipo_lugar_id','tipo_lugar_nombre'); 
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->lugar_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
                'municipios' => $municipios,
                'tipos'=>$tipos,
            ]);
        }
    }

    /**
     * Deletes an existing Lugar model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    public function actionAutocompletar($search = null, $municipio= null, $sindicatura=null, $poblacion=null, $colonia=null , $id = null) {
        $out = ['more' => false];
        if (!is_null($search)) {
            $query = new Query;
            $query->select('sindicatura_id, poblacion_id, colonia_id, poblacion_id, colonia_id , municipio_id, lugar_id as id, lugar_nombre as text')
                ->from('lugar')
                ->where('lugar_nombre LIKE "%' . $search .'%"'.
                   
                    ( empty($municipio)? ' ' :' and municipio_id = '.$municipio).' '.
                    ( empty($sindicatura)? ' ' :' and sindicatura_id = '.$sindicatura).' '.
                    ( empty($poblacion)? ' ' :' and poblacion_id = '.$poblacion).' '.
                    ( empty($colonia)? ' ' :' and colonia_id = '.$colonia)

                    )->limit(5000);
            $command = $query->createCommand();
            $data = $command->queryAll();
            $out['results'] = array_values($data);
        }
        elseif ($id > 0) {
            $out['results'] = ['id' => $id, 'text' => Lugar::findOne($id)->lugar_nombre];
        }
        else {
            $out['results'] = ['id' => 0, 'text' => 'No se encontraron resultados'];
        }
        echo Json::encode($out);
    }

    public function actionDatosLugar($id)
    {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $model=$this->findModel($id);
        return $model->attributes;
    }
    /**
     * Finds the Lugar model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Lugar the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Lugar::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
