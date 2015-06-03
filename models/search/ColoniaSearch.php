<?php

namespace app\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Colonia;

/**
 * ColoniaSearch represents the model behind the search form about `app\models\Colonia`.
 */
class ColoniaSearch extends Colonia
{
    public $municipioName;
    public $sindicaturaName;
    public $poblacionName;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['colonia_id', 'poblacion_id', 'sindicatura_id', 'municipio_id'], 'integer'],
            [['colonia_nombre'], 'safe'],
            [['municipioName'],'safe'],
            [['sindicaturaName'],'safe'],
            [['poblacionName'],'safe'],
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
        
        $query = Colonia::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $dataProvider->setSort([
                'attributes'=>[
                    'colonia_nombre', 
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
            return $dataProvider;
        }

        $query->andFilterWhere([
            'colonia_id' => $this->colonia_id,
            'poblacion_id' => $this->poblacion_id,
            'sindicatura_id' => $this->sindicatura_id,
            'municipio_id' => $this->municipio_id,

        ]);

        $query->andFilterWhere(['like', 'colonia_nombre', $this->colonia_nombre]);
            
        $query->joinWith(['municipio'=>function ($q) 
        {
            if(!empty($this->municipioName))
            $q->where('municipio.municipio_nombre LIKE "%' . 
            $this->municipioName . '%"');
        }]);

        $query->joinWith(['sindicatura'=>function ($q) 
        {
            if(!empty($this->sindicaturaName))
            $q->where('sindicatura.sindicatura_nombre LIKE "%' . 
            $this->sindicaturaName . '%"');
        }]);

        $query->joinWith(['poblacion'=>function ($q) 
        {
            if(!empty($this->poblacionName))
            $q->where('poblacion.poblacion_nombre LIKE "%' . 
            $this->poblacionName . '%"');
        }]);
        return $dataProvider;
    }
}
