<?php

namespace app\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\TipoLugar;

/**
 * TipoLugarSearch represents the model behind the search form about `app\models\TipoLugar`.
 */
class TipoLugarSearch extends TipoLugar
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tipo_lugar_id'], 'integer'],
            [['tipo_lugar_nombre'], 'safe'],
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
        $query = TipoLugar::find();

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
            'tipo_lugar_id' => $this->tipo_lugar_id,
        ]);

        $query->andFilterWhere(['like', 'tipo_lugar_nombre', $this->tipo_lugar_nombre]);

        return $dataProvider;
    }
}
