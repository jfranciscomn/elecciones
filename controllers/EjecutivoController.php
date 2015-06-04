<?php



namespace app\controllers;

use Yii;
use app\models\Incidente;
class EjecutivoController extends \yii\web\Controller
{
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
			$tipos[]= [ $value['tipo'],(int)$value['cantidad']] ;
		}

	    return $this->render('index',['distritos'=>$distritos,'tipos'=>$tipos]);
	}

}
