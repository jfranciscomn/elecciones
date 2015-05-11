<?php

namespace app\controllers;

use Yii;
use app\models\Sindicatura;
use app\models\Municipio;
use app\models\Usuario;
use app\models\search\SindicaturaSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\db\Query;
use yii\helpers\Json;

/**
 * SindicaturaController implements the CRUD actions for Sindicatura model.
 */
class SindicaturaController extends Controller
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
     * Lists all Sindicatura models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SindicaturaSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Sindicatura model.
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
     * Creates a new Sindicatura model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Sindicatura();
        $data =  Municipio::find()->all();
        $municipios = (count($data)==0)? [''=>'']: \yii\helpers\ArrayHelper::map($data, 'municipio_id','municipio_nombre'); 

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->sindicatura_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
                'municipios'=>$municipios,
            ]);
        }
    }

    /**
     * Updates an existing Sindicatura model.
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
            return $this->redirect(['view', 'id' => $model->sindicatura_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
                'municipios'=>$municipios,
            ]);
        }
    }

    /**
     * Deletes an existing Sindicatura model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }


    public function actionAutocompletar($search = null, $municipio= null, $id = null) {
    $out = ['more' => false];
    if (!is_null($search)) {
        $query = new Query;
        $query->select('sindicatura_id as id, sindicatura_nombre AS text')
            ->from('sindicatura')
            ->where('sindicatura_nombre LIKE "%' . $search .'%"'.' and municipio_id = '.$municipio)
            ->limit(20);
        $command = $query->createCommand();
        $data = $command->queryAll();
        $out['results'] = array_values($data);
    }
    elseif ($id > 0) {
        $out['results'] = ['id' => $id, 'text' => Sindicatura::findOne($id)->sindicatura_nombre];
    }
    else {
        $out['results'] = ['id' => 0, 'text' => 'No se encontraron resultados'];
    }
    echo Json::encode($out);
}

    /**
     * Finds the Sindicatura model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Sindicatura the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Sindicatura::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
