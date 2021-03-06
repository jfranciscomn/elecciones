<?php

namespace app\controllers;

use Yii;
use app\models\SubclaseIncidente;
use app\models\Usuario;
use app\models\ClaseIncidente;
use app\models\search\SubclaseIncidenteSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\db\Query;
use yii\helpers\Json;

/**
 * SubclaseIncidenteController implements the CRUD actions for SubclaseIncidente model.
 */
class SubclaseIncidenteController extends Controller
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
     * Lists all SubclaseIncidente models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SubclaseIncidenteSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single SubclaseIncidente model.
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
     * Creates a new SubclaseIncidente model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new SubclaseIncidente();
        $data =  ClaseIncidente::find()->all();
        $claseIncidentes = (count($data)==0)? [''=>'']: \yii\helpers\ArrayHelper::map($data, 'clase_incidente_id','clase_incidente_nombre');
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->subclase_incidente_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
                'claseIncidentes' => $claseIncidentes,
            ]);
        }
    }

    /**
     * Updates an existing SubclaseIncidente model.
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
            return $this->redirect(['view', 'id' => $model->subclase_incidente_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
                                'claseIncidentes' => $claseIncidentes,

            ]);
        }
    }

    /**
     * Deletes an existing SubclaseIncidente model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    public function actionAutocompletar($search = null, $claseincidente= null, $id = null) {
        $out = ['more' => false];
        if (!is_null($search)) {
            $query = new Query;
            $query->select('subclase_incidente_id as id, subclase_incidente_nombre AS text, clase_incidente_id')
                ->from('subclase_incidente')
                ->where('subclase_incidente_nombre LIKE "%' . $search .'%"'.' and clase_incidente_id = '.(empty($claseincidente)? 0: $claseincidente) )
                ->limit(20);
            $command = $query->createCommand();
            $data = $command->queryAll();
            $out['results'] = array_values($data);
        }
        elseif ($id > 0) {
            $out['results'] = ['id' => $id, 'text' => SubclaseIncidente::findOne($id)->subclase_incidente_nombre];
        }
        else {
            $out['results'] = ['id' => 0, 'text' => 'No se encontraron resultados para subclase'];
        }
        echo Json::encode($out);
    }


    /**
     * Finds the SubclaseIncidente model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return SubclaseIncidente the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = SubclaseIncidente::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
