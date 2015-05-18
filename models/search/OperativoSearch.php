<?php

namespace app\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Operativo;

/**
 * OperativoSearch represents the model behind the search form about `app\models\Operativo`.
 */
class OperativoSearch extends Operativo
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['operativo_id', 'activo'], 'integer'],
            [['operativo_nombre', 'fecha_inicio', 'fecha_fin'], 'safe'],
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
        $query = Operativo::find();

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
            'operativo_id' => $this->operativo_id,
            'fecha_inicio' => $this->fecha_inicio,
            'fecha_fin' => $this->fecha_fin,
            'activo' => $this->activo,
        ]);

        $query->andFilterWhere(['like', 'operativo_nombre', $this->operativo_nombre]);

        return $dataProvider;
    }
}
