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

    public $corpoName;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['corporacion_id', 'tipo_corporacion_id'], 'integer'],
            [['corporacion_nombre'], 'safe'],
            [['corpoName'], 'safe'],
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

        $dataProvider->setSort([
                'attributes'=>[
                    'corporacion_nombre',
                    'corpoName'=>[
                        'asc'=>['tipo_corporacion.tipo_corporacion_nombre'=>SORT_ASC],
                        'desc'=>['tipo_corporacion.tipo_corporacion_nombre'=>SORT_DESC],
                        'label'=>'Tipo de Corporacion'

                    ],
                ]
            ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to any records when validation fails
            // $query->where('0=1');
            $query->joinWith('tipoCorporacion');
            return $dataProvider;
        }

 

        $query->andFilterWhere([
            'corporacion_id' => $this->corporacion_id,
            'tipo_corporacion_id' => $this->tipo_corporacion_id,
        ]);

        $query->andFilterWhere(['like', 'corporacion_nombre', $this->corporacion_nombre]);

        $query->joinWith(['tipoCorporacion'=>function ($q) 
        {
            $q->where('tipo_corporacion.tipo_corporacion_nombre LIKE "%' . 
            $this->corpoName . '%"');
        }]);

        return $dataProvider;
    }
}
