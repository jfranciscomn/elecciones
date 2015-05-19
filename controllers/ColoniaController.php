<?php

namespace app\controllers;

use Yii;
use app\models\Colonia;
use app\models\Municipio;
use app\models\Usuario;
use app\models\search\ColoniaSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\db\Query;
use yii\helpers\Json;

/**
 * ColoniaController implements the CRUD actions for Colonia model.
 */
class ColoniaController extends Controller
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
     * Lists all Colonia models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ColoniaSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Colonia model.
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
     * Creates a new Colonia model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Colonia();
        $data =  Municipio::find()->all();
        $municipios = (count($data)==0)? [''=>'']: \yii\helpers\ArrayHelper::map($data, 'municipio_id','municipio_nombre'); 
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->colonia_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
                'municipios' => $municipios,
            ]);
        }
    }

    /**
     * Updates an existing Colonia model.
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
            return $this->redirect(['view', 'id' => $model->colonia_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
                'municipios' => $municipios,
            ]);
        }
    }

    /**
     * Deletes an existing Colonia model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    public function actionAutocompletar($search = null, $municipio= null, $sindicatura=null, $poblacion=null, $id = null) {
        $out = ['more' => false];
        if (!is_null($search)) {
            $query = new Query;
            $query->select('sindicatura_id, poblacion_id, colonia_nombre AS text, colonia_id as id, municipio_id')
                ->from('colonia')
                ->where('colonia_nombre LIKE "%' . $search .'%"'.
                    ( empty($municipio)? ' ' :' and municipio_id = '.$municipio).' '.
                    ( empty($sindicatura)? ' ' :' and sindicatura_id = '.$sindicatura).' '.
                    ( empty($poblacion)? ' ' :' and poblacion_id = '.$poblacion)
                    )->limit(20);
            $command = $query->createCommand();
            $data = $command->queryAll();
            $out['results'] = array_values($data);
        }
        elseif ($id > 0) {
            $out['results'] = ['id' => $id, 'text' => Colonia::findOne($id)->colonia_nombre];
        }
        else {
            $out['results'] = ['id' => 0, 'text' => 'No se encontraron resultados'];
        }
        echo Json::encode($out);
    }

    /**
     * Finds the Colonia model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Colonia the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Colonia::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
