<?php

namespace app\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Corporacion;

/**
 * CorporacionSearch represents the model behind the search form about `app\models\Corporacion`.
 */
class CorporacionSearch extends Corporacion
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['corporacion_id', 'tipo_corporacion_id'], 'integer'],
            [['corporacion_nombre'], 'safe'],
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
        $query = Corporacion::find();

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
            'corporacion_id' => $this->corporacion_id,
            'tipo_corporacion_id' => $this->tipo_corporacion_id,
        ]);

        $query->andFilterWhere(['like', 'corporacion_nombre', $this->corporacion_nombre]);

        return $dataProvider;
    }
}
