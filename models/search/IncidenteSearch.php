<?php

namespace app\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Incidente;

/**
 * IncidenteSearch represents the model behind the search form about `app\models\Incidente`.
 */
class IncidenteSearch extends Incidente
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['incidente_id', 'colonia_id', 'poblacion_id', 'sindicatura_id', 'municipio_id', 'operativo_id', 'subclase2_incidente_id', 'subclase_incidente_id', 'clase_incidente_id', 'usuario_id'], 'integer'],
            [['fecha'], 'safe'],
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
        $query = Incidente::find();

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
            'incidente_id' => $this->incidente_id,
            'colonia_id' => $this->colonia_id,
            'poblacion_id' => $this->poblacion_id,
            'sindicatura_id' => $this->sindicatura_id,
            'municipio_id' => $this->municipio_id,
            'operativo_id' => $this->operativo_id,
            'subclase2_incidente_id' => $this->subclase2_incidente_id,
            'subclase_incidente_id' => $this->subclase_incidente_id,
            'clase_incidente_id' => $this->clase_incidente_id,
            'fecha' => $this->fecha,
            'usuario_id' => $this->usuario_id,
        ]);

        return $dataProvider;
    }
}
