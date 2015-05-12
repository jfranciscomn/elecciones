<?php

namespace app\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Subclase2Incidente;

/**
 * Subclase2IncidenteSearch represents the model behind the search form about `app\models\Subclase2Incidente`.
 */
class Subclase2IncidenteSearch extends Subclase2Incidente
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['subclase2_incidente_id', 'subclase_incidente_id', 'clase_incidente_id'], 'integer'],
            [['subclase2_incidente_nombre'], 'safe'],
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
        $query = Subclase2Incidente::find();

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
            'subclase2_incidente_id' => $this->subclase2_incidente_id,
            'subclase_incidente_id' => $this->subclase_incidente_id,
            'clase_incidente_id' => $this->clase_incidente_id,
        ]);

        $query->andFilterWhere(['like', 'subclase2_incidente_nombre', $this->subclase2_incidente_nombre]);

        return $dataProvider;
    }
}
