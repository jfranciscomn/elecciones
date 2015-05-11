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
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['lugar_id', 'tipo_lugar_id', 'poblacion_id', 'sindicatura_id', 'municipio_id', 'colonia_id'], 'integer'],
            [['lugar_nombre', 'direccion'], 'safe'],
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

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to any records when validation fails
            // $query->where('0=1');
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

        return $dataProvider;
    }
}
