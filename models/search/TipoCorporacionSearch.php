<?php

namespace app\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\TipoCorporacion;

/**
 * TipoCorporacionSearch represents the model behind the search form about `app\models\TipoCorporacion`.
 */
class TipoCorporacionSearch extends TipoCorporacion
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tipo_corporacion_id'], 'integer'],
            [['tipo_corporacion_nombre'], 'safe'],
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
        $query = TipoCorporacion::find();

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
            'tipo_corporacion_id' => $this->tipo_corporacion_id,
        ]);

        $query->andFilterWhere(['like', 'tipo_corporacion_nombre', $this->tipo_corporacion_nombre]);

        return $dataProvider;
    }
}
