<?php

namespace app\controllers;

use Yii;
use app\models\Incidente;
use app\models\IncidenteHasCorporacion;
use app\models\search\IncidenteHasCorporacionSearch;
use app\models\Municipio;
use app\models\Operativo;
use app\models\EstadoPersona;
use app\models\Persona;
use app\models\Seguimiento;
use app\models\Distrito;
use app\models\search\SeguimientoSearch;
use app\models\search\PersonaSearch;
use app\models\ClaseIncidente;
use app\models\Usuario;
use app\models\Corporacion;
use app\models\Vehiculo;
use app\models\EstadoVehiculo;
use app\models\search\VehiculoSearch;
use app\models\MarcaVehiculo;
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
        $searchModelCorporacion = new IncidenteHasCorporacionSearch();
        $dataProviderCorporacion = $searchModelCorporacion->search(Yii::$app->request->queryParams);

        $searchModelPersonas = new PersonaSearch();
        $dataProviderPersonas = $searchModelPersonas->search(Yii::$app->request->queryParams);

        $searchModelVehiculo = new VehiculoSearch();
        $dataProviderVehiculo = $searchModelVehiculo->search(Yii::$app->request->queryParams);

        $searchModelSeguimiento = new SeguimientoSearch();
        $dataProviderSeguimiento = $searchModelSeguimiento->search(Yii::$app->request->queryParams);

        return $this->render('view', [
            'model' => $this->findModel($incidente_id),
            'dataProviderCorporacion'=>$dataProviderCorporacion,
            'dataProviderPersonas'=>$dataProviderPersonas,
            'dataProviderVehiculo'=>$dataProviderVehiculo,
            'dataProviderSeguimiento'=>$dataProviderSeguimiento,
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

        $data =  Distrito::find()->all();
        $distritos = (count($data)==0)? [''=>'']: \yii\helpers\ArrayHelper::map($data, 'distrito_id','distrito_nombre'); 

        $model->usuario_id =Yii::$app->user->identity->id;

        $sql= 'Select * FROM operativo where operativo_id =1';

        $modela = Operativo::findBySql($sql)->one(); 




        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['agregar-corporacion', 'incidente_id' => $model->incidente_id]);
        } else {
            return $this->render('create', [
                'model' => $model,

                'municipios'=>$municipios,
                'operativos'=>$operativos,
                'claseIncidente'=>$claseIncidente,
                'distritos'=>$distritos,
            ]);
        }
    }

    public function actionAgregarCorporacion($incidente_id,$bandera=null)
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
           'incidente_id'=> $incidente_id,
           'bandera'=>$bandera,
               
           'dataProvider' => $dataProvider,
        ]);
      
    }
    public function actionAgregarSeguimiento($incidente_id)
    {
        $model =  new Seguimiento();

        $data =  Corporacion::find()->all();
        $corporaciones = (count($data)==0)? [''=>'']: \yii\helpers\ArrayHelper::map($data, 'corporacion_id','corporacion_nombre');
        

        if ($model->load(Yii::$app->request->post()) ) {
            $model->incidente_id=$incidente_id;
            if($model->save())
            {
                $modela = IncidenteHasCorporacion::find()->where(['incidente_id'=>$model->incidente_id,'corporacion_id'=>$model->corporacion_id])->one(); 
                if(empty($modela))
                {
                    $modela= new IncidenteHasCorporacion;
                    $modela->incidente_id=$model->incidente_id;
                    $modela->corporacion_id=$model->corporacion_id;
                    $modela->save();
                }
                
                return $this->redirect(['agregar-persona', 'incidente_id' => $model->incidente_id]);
            }

        }
        return $this->render('addSeg', [
           'model' => $model,
           'corporaciones'=> $corporaciones,
           'incidente_id'=> $incidente_id,
        ]);
      
    }

    public function actionAgregarPersona($incidente_id,$persona_id=null)
    {

        $model =  new Persona();
        if(isset($persona_id))
            $model = Persona::findOne($persona_id);


        $data =  Municipio::find()->all();
        $municipios = (count($data)==0)? [''=>'']: \yii\helpers\ArrayHelper::map($data, 'municipio_id','municipio_nombre'); 

        $data =  EstadoPersona::find()->all();
        $estados = (count($data)==0)? [''=>'']: \yii\helpers\ArrayHelper::map($data, 'estado_persona_id','estado_persona_nombre'); 
       
        $searchModel = new PersonaSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);


        if ($model->load(Yii::$app->request->post()) ) {
            $model->incidente_id=$incidente_id;
            $model->save();
            if(isset($persona_id))
                $this->redirect(['view', 'incidente_id' => $incidente_id]);
            $model = new Persona();
        }
  

        return $this->render('addPers', [
            'model' => $model,
            'municipios'=>$municipios,
            'estados'=>$estados,
            'dataProvider' => $dataProvider,
               'incidente_id'=> $incidente_id,

            ]);
             
    }



    public function actionAgregarVehiculo($incidente_id,$vehiculo_id=null)
    {
        $model =  new Vehiculo();
        if(isset($vehiculo_id))
            $model = Vehiculo::findOne($vehiculo_id);

        $data =  EstadoVehiculo::find()->all();
        $estados = (count($data)==0)? [''=>'']: \yii\helpers\ArrayHelper::map($data, 'estado_vehiculo_id','estado_vehiculo_nombre'); 
       
        $data =  MarcaVehiculo::find()->all();
        $marcas = (count($data)==0)? [''=>'']: \yii\helpers\ArrayHelper::map($data, 'marca_vehiculo_id','marca_vehiculoco_nombre'); 

        $model->incidente_id=$incidente_id;
        $searchModel = new VehiculoSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        if ($model->load(Yii::$app->request->post()) ) {
            $model->incidente_id=$incidente_id;
            $model->save();
            $model = new Vehiculo();
        }



        return $this->render('addvehi', [
           'model' => $model,
           'estados'=>$estados,
           'marcas'=>$marcas,
           'dataProvider' => $dataProvider,
           'incidente_id'=> $incidente_id,

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

    public function actionPersonaDelete($incidente_id, $persona_id)
    {
        $model = Persona::findOne(['incidente_id' => $incidente_id, 'persona_id' => $persona_id]);
        $model->delete();
        

        return $this->redirect(Yii::$app->request->referrer);
    }

    public function actionVehiculoDelete($vehiculo_id)
    {
        $model = Vehiculo::findOne(['vehiculo_id' => $vehiculo_id]);
        $model->delete();
        

        return $this->redirect(Yii::$app->request->referrer);
    }

    public function actionSeguimientoDelete($seguimiento_id)
    {
        $model = Seguimiento::findOne(['seguimiento_id' => $seguimiento_id]);
        $model->delete();
        

        return $this->redirect(Yii::$app->request->referrer);
    }


    public function actionDelete($incidente_id)
    {
        $this->findModel($incidente_id)->delete();

        return $this->redirect(['index']);
    }

    public function actionDatosIncidente($id)
    {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $model=$this->findModel($id);
        return $model->attributes;
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
 
