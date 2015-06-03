<?php

namespace app\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\GamaVehiculo;

/**
 * GamaVehiculoSearch represents the model behind the search form about `app\models\GamaVehiculo`.
 */
class GamaVehiculoSearch extends GamaVehiculo
{
    public $marcaName;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['gama_vehiculo_id', 'marca_vehiculo_id'], 'integer'],
            [['gama_vehiculo_nombre'], 'safe'],
            [['marcaName'], 'safe'],
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
        $query = GamaVehiculo::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $dataProvider->setSort([
                'attributes'=>[
                    'gama_vehiculo_nombre',
                    'marcaName'=>[
                        'asc'=>['marca_vehiculo.marca_vehiculoco_nombre'=>SORT_ASC],
                        'desc'=>['marca_vehiculo.marca_vehiculoco_nombre'=>SORT_DESC],
                        'label'=>'Marca'

                    ],
                ]
            ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to any records when validation fails
            // $query->where('0=1');
            $query->joinWith('marcaVehiculo');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'gama_vehiculo_id' => $this->gama_vehiculo_id,
            'marca_vehiculo_id' => $this->marca_vehiculo_id,
        ]);

        $query->andFilterWhere(['like', 'gama_vehiculo_nombre', $this->gama_vehiculo_nombre]);

        $query->joinWith(['marcaVehiculo'=>function ($q) 
        {
            if(!empty($this->marcaName))
            $q->where('marca_vehiculo.marca_vehiculoco_nombre LIKE "%' . 
            $this->marcaName . '%"');
        }]);

        return $dataProvider;
    }
}
