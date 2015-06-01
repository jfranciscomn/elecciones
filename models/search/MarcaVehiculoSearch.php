<?php

namespace app\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\MarcaVehiculo;

/**
 * MarcaVehiculoSearch represents the model behind the search form about `app\models\MarcaVehiculo`.
 */
class MarcaVehiculoSearch extends MarcaVehiculo
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['marca_vehiculo_id'], 'integer'],
            [['marca_vehiculoco_nombre'], 'safe'],
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
        $query = MarcaVehiculo::find();

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
            'marca_vehiculo_id' => $this->marca_vehiculo_id,
        ]);

        $query->andFilterWhere(['like', 'marca_vehiculoco_nombre', $this->marca_vehiculoco_nombre]);

        return $dataProvider;
    }
}
