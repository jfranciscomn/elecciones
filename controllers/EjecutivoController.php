<?php



namespace app\controllers;

use Yii;
use app\models\Incidente;
use app\models\Distrito;
use app\models\search\IncidenteHasCorporacionSearch;
use app\models\search\PersonaSearch;
use app\models\search\VehiculoSearch;
use app\models\search\SeguimientoSearch;
use app\models\SubclaseIncidente;
use app\models\search\IncidenteSearch;
use app\models\Usuario;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;


class EjecutivoController extends \yii\web\Controller
{
	public function behaviors()
    {
        return [
            'rules' => Usuario::permisos(Yii::$app->controller->id),
            'verbs' => [
                'class' => VerbFilter::className(),
            ],
        ];
    }

    public function actionIndex()
    {
    	

    	$connection = \Yii::$app->db;

    	$model = $connection->createCommand('SELECT l.distrito_nombre as "distrito", count(*) as "cantidad"
					from incidente i
					inner join distrito l on i.distrito_id=l.distrito_id
                    where i.incidente_estado = "POSITIVO"
					group by l.distrito_nombre order by l.distrito_nombre');
    	$distrit = $model->queryAll();
		$distritos=[];
		foreach ($distrit as $value) {
			$distritos[]= [ $value['distrito'],(int)$value['cantidad']] ;
		}

		$model = $connection->createCommand('SELECT l.subclase_incidente_nombre as tipo, count(*) as cantidad
		from incidente i
		inner join subclase_incidente l on i.subclase_incidente_id=l.subclase_incidente_id
        where i.incidente_estado = "POSITIVO"
		group by l.subclase_incidente_nombre');
    	$distrit = $model->queryAll();
		$tipos=[];
		foreach ($distrit as $value) {
			$tipos[]= [ trim($value['tipo']),(int)$value['cantidad']] ;
		}


        $model = $connection->createCommand('SELECT i.incidente_estado as estado, count(*) as cantidad
        from incidente i
        group by i.incidente_estado');
        $estad = $model->queryAll();
        $estados=[];
        foreach ($estad as $value) {
            $estados[]= [ trim($value['estado']),(int)$value['cantidad']] ;
        }

	    return $this->render('index',['distritos'=>$distritos,'tipos'=>$tipos, 'estados'=>$estados]);
	}

	public function actionIncidenteDistritoModal($nombre_distrito,$incidente_estado)
	{
		$distrito = Distrito::find()->where(['distrito_nombre'=>$nombre_distrito])->one();
		$searchModel = new IncidenteSearch(['distrito_id'=>$distrito->distrito_id,'incidente_estado'=>$incidente_estado]);
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
		return $this->renderAjax("incidente-distrito-modal",[
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'tipo'=>'distrito'
        ]);
	}

	public function actionIncidenteTipoModal($subclase_nombre,$incidente_estado)
	{
		$subclase = SubclaseIncidente::find()->where(['subclase_incidente_nombre'=>$subclase_nombre])->one();
		
		$searchModel = new IncidenteSearch(['subclase_incidente_id'=>$subclase->subclase_incidente_id,'incidente_estado'=>$incidente_estado]);
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
		return $this->renderAjax("incidente-distrito-modal",[
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'tipo'=>'tipo'
        ]);
	}

    public function actionIncidenteEstadoModal($incidente_estado)
    {
        
        $searchModel = new IncidenteSearch(['incidente_estado'=>$incidente_estado]);
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        return $this->renderAjax("incidente-distrito-modal",[
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'tipo'=>'estado'
        ]);
    }
	public function actionDetalleIncidente($incidente_id,$distrito_id=null,$tipo=null)
	{
		$incidente = Incidente::findOne($incidente_id);
		$distrito = Distrito::findOne($incidente_id);

		$searchModelCorporacion = new IncidenteHasCorporacionSearch();
        $dataProviderCorporacion = $searchModelCorporacion->search(Yii::$app->request->queryParams);

        $searchModelPersonas = new PersonaSearch();
        $dataProviderPersonas = $searchModelPersonas->search(Yii::$app->request->queryParams);

        $searchModelVehiculo = new VehiculoSearch();
        $dataProviderVehiculo = $searchModelVehiculo->search(Yii::$app->request->queryParams);

        $searchModelSeguimiento = new SeguimientoSearch();
        $dataProviderSeguimiento = $searchModelSeguimiento->search(Yii::$app->request->queryParams);

		return $this->renderAjax("incidente-detalle-modal",[
            'model' => $incidente,
            'dataProviderCorporacion'=>$dataProviderCorporacion,
            'dataProviderPersonas'=>$dataProviderPersonas,
            'dataProviderVehiculo'=>$dataProviderVehiculo,
            'dataProviderSeguimiento'=>$dataProviderSeguimiento,

            'tipo' => $tipo,
        ]);
	}

}

