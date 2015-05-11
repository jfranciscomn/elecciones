<?php

namespace app\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Zona;

/**
 * ZonaSearch represents the model behind the search form about `app\models\Zona`.
 */
class ZonaSearch extends Zona
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['zona_id'], 'integer'],
            [['zona_nombre'], 'safe'],
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
        $query = Zona::find();

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
            'zona_id' => $this->zona_id,
        ]);

        $query->andFilterWhere(['like', 'zona_nombre', $this->zona_nombre]);

        return $dataProvider;
    }
}
