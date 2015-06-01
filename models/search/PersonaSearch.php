<?php

namespace app\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Persona;

/**
 * PersonaSearch represents the model behind the search form about `app\models\Persona`.
 */
class PersonaSearch extends Persona
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['persona_id', 'incidente_id', 'estado_persona_id', 'edad', 'sexo', 'colonia_id', 'poblacion_id', 'sindicatura_id', 'municipio_id'], 'integer'],
            [['persona_nombre', 'domicilio'], 'safe'],
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
        $query = Persona::find();

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
            'persona_id' => $this->persona_id,
            'incidente_id' => $this->incidente_id,
            'estado_persona_id' => $this->estado_persona_id,
            'edad' => $this->edad,
            'sexo' => $this->sexo,
            'colonia_id' => $this->colonia_id,
            'poblacion_id' => $this->poblacion_id,
            'sindicatura_id' => $this->sindicatura_id,
            'municipio_id' => $this->municipio_id,
        ]);

        $query->andFilterWhere(['like', 'persona_nombre', $this->persona_nombre])
            ->andFilterWhere(['like', 'domicilio', $this->domicilio]);

        return $dataProvider;
    }
}
