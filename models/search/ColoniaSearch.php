<?php

namespace app\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Colonia;

/**
 * ColoniaSearch represents the model behind the search form about `app\models\Colonia`.
 */
class ColoniaSearch extends Colonia
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['colonia_id', 'poblacion_id', 'sindicatura_id', 'municipio_id'], 'integer'],
            [['colonia_nombre'], 'safe'],
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
        $query = Colonia::find();

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
            'colonia_id' => $this->colonia_id,
            'poblacion_id' => $this->poblacion_id,
            'sindicatura_id' => $this->sindicatura_id,
            'municipio_id' => $this->municipio_id,
        ]);

        $query->andFilterWhere(['like', 'colonia_nombre', $this->colonia_nombre]);

        return $dataProvider;
    }
}
