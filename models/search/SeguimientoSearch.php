<?php

namespace app\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Seguimiento;

/**
 * SeguimientoSearch represents the model behind the search form about `app\models\Seguimiento`.
 */
class SeguimientoSearch extends Seguimiento
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['seguimiento_id', 'corporacion_id', 'incidente_id'], 'integer'],
            [['fecha', 'descripcion'], 'safe'],
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
        $query = Seguimiento::find();

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
            'seguimiento_id' => $this->seguimiento_id,
            'fecha' => $this->fecha,
            'corporacion_id' => $this->corporacion_id,
            'incidente_id' => $this->incidente_id,
        ]);

        $query->andFilterWhere(['like', 'descripcion', $this->descripcion]);

        return $dataProvider;
    }
}
