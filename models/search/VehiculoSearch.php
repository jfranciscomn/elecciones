<?php

namespace app\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Vehiculo;

/**
 * VehiculoSearch represents the model behind the search form about `app\models\Vehiculo`.
 */
class VehiculoSearch extends Vehiculo
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['vehiculo_id', 'incidente_id', 'estado_vehiculo_id', 'gama_vehiculo_id', 'marca_vehiculo_id'], 'integer'],
            [['placas', 'modelo', 'numero_serie'], 'safe'],
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
        $query = Vehiculo::find();

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
            'vehiculo_id' => $this->vehiculo_id,
            'incidente_id' => $this->incidente_id,
            'estado_vehiculo_id' => $this->estado_vehiculo_id,
            'gama_vehiculo_id' => $this->gama_vehiculo_id,
            'marca_vehiculo_id' => $this->marca_vehiculo_id,
        ]);

        $query->andFilterWhere(['like', 'placas', $this->placas])
            ->andFilterWhere(['like', 'modelo', $this->modelo])
            ->andFilterWhere(['like', 'numero_serie', $this->numero_serie]);

        return $dataProvider;
    }
}
