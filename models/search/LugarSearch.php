<?php

namespace app\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Lugar;

/**
 * LugarSearch represents the model behind the search form about `app\models\Lugar`.
 */
class LugarSearch extends Lugar
{
    public $municipioName;
    public $sindicaturaName;
    public $poblacionName;
    public $tipoName;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['lugar_id', 'tipo_lugar_id', 'poblacion_id', 'sindicatura_id', 'municipio_id', 'colonia_id'], 'integer'],
            [['lugar_nombre', 'direccion'], 'safe'],
            [['municipioName'],'safe'],
            [['sindicaturaName'],'safe'],
            [['poblacionName'],'safe'],
            [['tipoName'],'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Lugar::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $dataProvider->setSort([
                'attributes'=>[
                    'lugar_nombre', 
                    'municipioName'=>[
                        'asc'=>['municipio.municipio_nombre'=>SORT_ASC],
                        'desc'=>['municipio.municipio_nombre'=>SORT_DESC],
                        'label'=>'Municipio'
                    ],
                    'sindicaturaName'=>[
                        'asc'=>['sindicatura.sindicatura_nombre'=>SORT_ASC],
                        'desc'=>['sindicatura.sindicatura_nombre'=>SORT_DESC],
                        'label'=>'Sindicatura'

                    ],
                    'poblacionName'=>[
                        'asc'=>['poblacion.poblacion_nombre'=>SORT_ASC],
                        'desc'=>['poblacion.poblacion_nombre'=>SORT_DESC],
                        'label'=>'Poblacion'

                    ],
                    'tipoName'=>[
                        'asc'=>['tipo_lugar.tipo_lugar_nombre'=>SORT_ASC],
                        'desc'=>['tipo_lugar.tipo_lugar_nombre'=>SORT_DESC],
                        'label'=>'Tipo de Lugar'

                    ]
                ]
            ]);
        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to any records when validation fails
            // $query->where('0=1');
            $query->joinWith('municipio');
            $query->joinWith('sindicatura');
            $query->joinWith('poblacion');
            $query->joinWith('tipoLugar');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'lugar_id' => $this->lugar_id,
            'tipo_lugar_id' => $this->tipo_lugar_id,
            'poblacion_id' => $this->poblacion_id,
            'sindicatura_id' => $this->sindicatura_id,
            'municipio_id' => $this->municipio_id,
            'colonia_id' => $this->colonia_id,
        ]);
        $query->andFilterWhere(['like', 'lugar_nombre', $this->lugar_nombre])
            ->andFilterWhere(['like', 'direccion', $this->direccion]);


        $query->andFilterWhere(['municipio_id' => $this->municipio_id]);
        $query->andFilterWhere(['sindicatura_id' => $this->sindicatura_id]);
        $query->andFilterWhere(['poblacion_id' => $this->poblacion_id]);
        $query->andFilterWhere(['tipo_lugar_id' => $this->tipo_lugar_id]);

        $query->joinWith(['municipio'=>function ($q) 
        {
            if(!empty($this->municipioName))
            $q->where('municipio.municipio_nombre LIKE "%' . 
            $this->municipioName . '%"');
        }]);

        //Join Sindicatura
        $query->joinWith(['sindicatura'=>function ($q) 
        {
            if(!empty($this->sindicaturaName))
            $q->where('sindicatura.sindicatura_nombre LIKE "%' . 
            $this->sindicaturaName . '%"');
        }]);
        
        //Join Poblacion
        $query->joinWith(['poblacion'=>function ($q) 
        {
            if(!empty($this->poblacionName))
            $q->where('poblacion.poblacion_nombre LIKE "%' . 
            $this->poblacionName . '%"');
        }]);

        //Join Tipo de lugar
        $query->joinWith(['tipoLugar'=>function ($q) 
        {
            if(!empty($this->tipoName))
            $q->where('tipo_lugar.tipo_lugar_nombre LIKE "%' . 
            $this->tipoName . '%"');
        }]);
        return $dataProvider;
    }
}
