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
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['gama_vehiculo_id', 'marca_vehiculo_id'], 'integer'],
            [['gama_vehiculo_nombre'], 'safe'],
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

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'gama_vehiculo_id' => $this->gama_vehiculo_id,
            'marca_vehiculo_id' => $this->marca_vehiculo_id,
        ]);

        $query->andFilterWhere(['like', 'gama_vehiculo_nombre', $this->gama_vehiculo_nombre]);

        return $dataProvider;
    }
}
