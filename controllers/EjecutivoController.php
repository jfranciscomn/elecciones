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
					group by l.distrito_nombre order by l.distrito_nombre');
    	$distrit = $model->queryAll();
		$distritos=[];
		foreach ($distrit as $value) {
			$distritos[]= [ $value['distrito'],(int)$value['cantidad']] ;
		}

		$model = $connection->createCommand('SELECT l.subclase_incidente_nombre as tipo, count(*) as cantidad
		from incidente i
		inner join subclase_incidente l on i.subclase_incidente_id=l.subclase_incidente_id
		group by l.subclase_incidente_nombre');
    	$distrit = $model->queryAll();
		$tipos=[];
		foreach ($distrit as $value) {
			$tipos[]= [ trim($value['tipo']),(int)$value['cantidad']] ;
		}

	    return $this->render('index',['distritos'=>$distritos,'tipos'=>$tipos]);
	}

	public function actionIncidenteDistritoModal($nombre_distrito)
	{
		$distrito = Distrito::find()->where(['distrito_nombre'=>$nombre_distrito])->one();
		$searchModel = new IncidenteSearch(['distrito_id'=>$distrito->distrito_id]);
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
		return $this->renderAjax("incidente-distrito-modal",[
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
	}

	public function actionIncidenteTipoModal($subclase_nombre)
	{
		$subclase = SubclaseIncidente::find()->where(['subclase_incidente_nombre'=>$subclase_nombre])->one();
		
		$searchModel = new IncidenteSearch(['subclase_incidente_id'=>$subclase->subclase_incidente_id]);
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
		return $this->renderAjax("incidente-distrito-modal",[
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
	}
	public function actionDetalleIncidente($incidente_id,$distrito_id=null)
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

            'distrito' => $distrito,
        ]);
	}

}

