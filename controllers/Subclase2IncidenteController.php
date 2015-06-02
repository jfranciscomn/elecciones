<?php

namespace app\controllers;

use Yii;
use app\models\Subclase2Incidente;
use app\models\Usuario;
use app\models\SubclaseIncidente;
use app\models\ClaseIncidente;
use app\models\search\Subclase2IncidenteSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\db\Query;
use yii\helpers\Json;

/**
 * Subclase2IncidenteController implements the CRUD actions for Subclase2Incidente model.
 */
class Subclase2IncidenteController extends Controller
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
     * Lists all Subclase2Incidente models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new Subclase2IncidenteSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Subclase2Incidente model.
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
     * Creates a new Subclase2Incidente model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Subclase2Incidente();
        $data =  ClaseIncidente::find()->all();
        $claseIncidentes = (count($data)==0)? [''=>'']: \yii\helpers\ArrayHelper::map($data, 'clase_incidente_id','clase_incidente_nombre');

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->subclase2_incidente_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
                'claseIncidentes' => $claseIncidentes,

            ]);
        }
    }

    /**
     * Updates an existing Subclase2Incidente model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $data =  ClaseIncidente::find()->all();
        $claseIncidentes = (count($data)==0)? [''=>'']: \yii\helpers\ArrayHelper::map($data, 'clase_incidente_id','clase_incidente_nombre');
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->subclase2_incidente_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
                'claseIncidentes' => $claseIncidentes,

            ]);
        }
    }

    /**
     * Deletes an existing Subclase2Incidente model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    public function actionAutocompletar($search = null, $clase= null, $subclase = null, $id = null) {
        $out = ['more' => false];
        if (!is_null($search)) {
            $query = new Query;
            $query->select('subclase_incidente_id,subclase2_incidente_id as id, subclase2_incidente_nombre AS text, clase_incidente_id')
                ->from('subclase2_incidente')
                ->where('subclase2_incidente_nombre LIKE "%' . $search .'%"'.' and clase_incidente_id = '.
                    (empty($clase)? 0: $clase). ( empty($subclase)? '' :' and subclase_incidente_id = '.$subclase))
                ->limit(20);
            $command = $query->createCommand();
            $data = $command->queryAll();
            $out['results'] = array_values($data);
        }
        elseif ($id > 0) {
            $out['results'] = ['id' => $id, 'text' => Subclase2Incidente::findOne($id)->subclase2_incidente_nombre];
        }
        else {
            $out['results'] = ['id' => 0, 'text' => 'No se encontraron resultados para sub clase 2'];
        }
        echo Json::encode($out);
    }

    /**
     * Finds the Subclase2Incidente model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Subclase2Incidente the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Subclase2Incidente::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
