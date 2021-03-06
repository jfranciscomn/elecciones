<?php

namespace app\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Poblacion;

/**
 * PoblacionSearch represents the model behind the search form about `app\models\Poblacion`.
 */
class PoblacionSearch extends Poblacion
{
    public $municipioName;
    public $sindicaturaName;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['poblacion_id', 'sindicatura_id', 'municipio_id'], 'integer'],
            [['poblacion_nombre'], 'safe'],
            [['municipioName'],'safe'],
            [['sindicaturaName'],'safe'],
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
        $query = Poblacion::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $dataProvider->setSort([
                'attributes'=>[
                    'poblacion_nombre',
                    'municipioName'=>[
                        'asc'=>['municipio.municipio_nombre'=>SORT_ASC],
                        'desc'=>['municipio.municipio_nombre'=>SORT_DESC],
                        'label'=>'Nombre del Municipio'

                    ],
                    
                ]
            ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to any records when validation fails
            // $query->where('0=1');
            $query->joinWith('municipio');

            $query->joinWith('sindicatura');
            return $dataProvider;
        }




        $query->andFilterWhere([
            'poblacion_id' => $this->poblacion_id,
            'sindicatura_id' => $this->sindicatura_id,
            'municipio_id' => $this->municipio_id,
        ]);

        $query->andFilterWhere(['like', 'poblacion_nombre', $this->poblacion_nombre]);
        $query->andFilterWhere(['municipio_id' => $this->municipio_id]);
        $query->andFilterWhere(['sindicatura_id' => $this->sindicatura_id]);

        $query->joinWith(['municipio'=>function ($q) 
        {
            if(!empty($this->municipioName))
            $q->where('municipio.municipio_nombre LIKE "%' . 
            $this->municipioName . '%"');
        }]);

        

        return $dataProvider;
    }
}
