<?php

namespace app\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Bitacora;

/**
 * BitacoraSearch represents the model behind the search form about `app\models\Bitacora`.
 */
class BitacoraSearch extends Bitacora
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['bitacora_id', 'usuario_id', 'accion_id', 'resultado'], 'integer'],
            [['fecha', 'datos_enviados', 'HTTP_USER_AGENT', 'HTTP_HOST', 'SERVER_PORT', 'REMOTE_ADDR', 'REMOTE_PORT', 'SERVER_PROTOCOL', 'REQUEST_METHOD', 'REQUEST_URI'], 'safe'],
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
        $query = Bitacora::find();

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
            'bitacora_id' => $this->bitacora_id,
            'fecha' => $this->fecha,
            'usuario_id' => $this->usuario_id,
            'accion_id' => $this->accion_id,
            'resultado' => $this->resultado,
        ]);

        $query->andFilterWhere(['like', 'datos_enviados', $this->datos_enviados])
            ->andFilterWhere(['like', 'HTTP_USER_AGENT', $this->HTTP_USER_AGENT])
            ->andFilterWhere(['like', 'HTTP_HOST', $this->HTTP_HOST])
            ->andFilterWhere(['like', 'SERVER_PORT', $this->SERVER_PORT])
            ->andFilterWhere(['like', 'REMOTE_ADDR', $this->REMOTE_ADDR])
            ->andFilterWhere(['like', 'REMOTE_PORT', $this->REMOTE_PORT])
            ->andFilterWhere(['like', 'SERVER_PROTOCOL', $this->SERVER_PROTOCOL])
            ->andFilterWhere(['like', 'REQUEST_METHOD', $this->REQUEST_METHOD])
            ->andFilterWhere(['like', 'REQUEST_URI', $this->REQUEST_URI]);

        return $dataProvider;
    }
}
