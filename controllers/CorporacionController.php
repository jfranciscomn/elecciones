<?php

namespace app\controllers;

use Yii;
use app\models\Corporacion;
use app\models\TipoCorporacion;
use app\models\Usuario;
use app\models\search\CorporacionSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * CorporacionController implements the CRUD actions for Corporacion model.
 */
class CorporacionController extends Controller
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
     * Lists all Corporacion models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new CorporacionSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Corporacion model.
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
     * Creates a new Corporacion model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Corporacion();
        $data =  TipoCorporacion::find()->all();
        $corporacionesTipos = (count($data)==0)? [''=>'']: \yii\helpers\ArrayHelper::map($data, 'tipo_corporacion_id','tipo_corporacion_nombre'); 

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->corporacion_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
                'corporacionesTipos' => $corporacionesTipos,
            ]);
        }
    }

    /**
     * Updates an existing Corporacion model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $data =  TipoCorporacion::find()->all();
        $corporacionesTipos = (count($data)==0)? [''=>'']: \yii\helpers\ArrayHelper::map($data, 'tipo_corporacion_id','tipo_corporacion_nombre'); 

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->corporacion_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
                'corporacionesTipos' => $corporacionesTipos,
            ]);
        }
    }

    /**
     * Deletes an existing Corporacion model.
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
     * Finds the Corporacion model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Corporacion the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Corporacion::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
