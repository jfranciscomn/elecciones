<?php

namespace app\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\EstadoVehiculo;

/**
 * EstadoVehiculoSearch represents the model behind the search form about `app\models\EstadoVehiculo`.
 */
class EstadoVehiculoSearch extends EstadoVehiculo
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['estado_vehiculo_id'], 'integer'],
            [['estado_vehiculo_nombre'], 'safe'],
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
        $query = EstadoVehiculo::find();

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
            'estado_vehiculo_id' => $this->estado_vehiculo_id,
        ]);

        $query->andFilterWhere(['like', 'estado_vehiculo_nombre', $this->estado_vehiculo_nombre]);

        return $dataProvider;
    }
}
