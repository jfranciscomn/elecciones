<?php



namespace app\controllers;

use Yii;
use app\models\Incidente;
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

    	$model = $connection->createCommand('SELECT l.distrito as "distrito", count(*) as "cantidad"
					from incidente i
					inner join lugar l on i.lugar_id=l.lugar_id
					group by l.distrito order by l.distrito');
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
		$searchModel = new IncidenteSearch(['municipio_id'=>1]);
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
		return $this->renderAjax("incidente-distrito-modal",[
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
	}

}
