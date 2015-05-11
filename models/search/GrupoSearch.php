<?php

namespace app\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Grupo;

/**
 * GrupoSearch represents the model behind the search form about `app\models\Grupo`.
 */
class GrupoSearch extends Grupo
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['grupo_id'], 'integer'],
            [['grupo_nombre'], 'safe'],
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
        $query = Grupo::find();

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
            'grupo_id' => $this->grupo_id,
        ]);

        $query->andFilterWhere(['like', 'grupo_nombre', $this->grupo_nombre]);

        return $dataProvider;
    }
}
