<?php

namespace app\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\IncidenteHasCorporacion;

/**
 * IncidenteHasCorporacionSearch represents the model behind the search form about `app\models\IncidenteHasCorporacion`.
 */
class IncidenteHasCorporacionSearch extends IncidenteHasCorporacion
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['incidente_id', 'corporacion_id'], 'integer'],
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
        $query = IncidenteHasCorporacion::find();

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
            'incidente_id' => $this->incidente_id,
            'corporacion_id' => $this->corporacion_id,
        ]);

        return $dataProvider;
    }
}
