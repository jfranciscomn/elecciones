<?php

namespace app\controllers;

use Yii;
use app\models\Incidente;
use app\models\IncidenteHasCorporacion;
use app\models\search\IncidenteHasCorporacionSearch;
use app\models\Municipio;
use app\models\Operativo;
use app\models\Persona;
use app\models\ClaseIncidente;
use app\models\Usuario;
use app\models\Corporacion;
use app\models\Vehiculo;
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

                'municipios'=>$municipios,
                'operativos'=>$operativos,
                'claseIncidente'=>$claseIncidente,
            ]);
        }
    }

    public function actionAgregarCorporacion($incidente_id)
    {
        $model =  new IncidenteHasCorporacion();
        $data =  Corporacion::find()->all();
        
        $searchModel = new IncidenteHasCorporacionSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        
        if ($model->load(Yii::$app->request->post()) ) {
            $model->incidente_id=$incidente_id;
            $model->save();
            $model = new IncidenteHasCorporacion();
        }


        $estasno=[];
        $corporaciones =[];
        if(count($data)==0)
            $corporaciones = [''=>''];

        $tomadas = IncidenteHasCorporacion::find()->where('incidente_id='.$incidente_id)->all();
        foreach ($tomadas as $tomada) {
            $estasno[$tomada->corporacion_id] = 1;
        }
        foreach ($data as $corp) {
            if (!isset($estasno[$corp->corporacion_id])) {
                $corporaciones[$corp->corporacion_id]=$corp->corporacion_nombre;
            }
            
        }
        //$corporaciones = (count($data)==0)? [''=>'']: \yii\helpers\ArrayHelper::map($data, 'corporacion_id','corporacion_nombre');
        
        return $this->render('addcorp', [
           'model' => (new IncidenteHasCorporacion),
           'corporaciones'=> $corporaciones,
               
           'dataProvider' => $dataProvider,
        ]);
      
    }

    public function actionAgregarPersona($incidente_id)
    {
        $model =  new Persona();
        $data =  Corporacion::find()->all();
        
        $searchModel = new IncidenteHasCorporacionSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        
        if ($model->load(Yii::$app->request->post()) ) {
            $model->incidente_id=$incidente_id;
            $model->save();
            $model = new IncidenteHasCorporacion();
        }


        $estasno=[];
        $corporaciones =[];
        if(count($data)==0)
            $corporaciones = [''=>''];

        $tomadas = IncidenteHasCorporacion::find()->where('incidente_id='.$incidente_id)->all();
        foreach ($tomadas as $tomada) {
            $estasno[$tomada->corporacion_id] = 1;
        }
        foreach ($data as $corp) {
            if (!isset($estasno[$corp->corporacion_id])) {
                $corporaciones[$corp->corporacion_id]=$corp->corporacion_nombre;
            }
            
        }
        //$corporaciones = (count($data)==0)? [''=>'']: \yii\helpers\ArrayHelper::map($data, 'corporacion_id','corporacion_nombre');
        
        return $this->render('addcorp', [
           'model' => (new IncidenteHasCorporacion),
           'corporaciones'=> $corporaciones,
               
           'dataProvider' => $dataProvider,
        ]);
      
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

    public function actionCorporacionDelete($incidente_id, $corporacion_id)
    {
        $model = IncidenteHasCorporacion::findOne(['incidente_id' => $incidente_id, 'corporacion_id' => $corporacion_id]);
        $model->delete();
        

        return $this->redirect(Yii::$app->request->referrer);
    }

    public function actionDelete($incidente_id)
    {
        $this->findModel($incidente_id)->delete();

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
