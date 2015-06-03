<?php

namespace app\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\SubclaseIncidente;
use app\models\ClaseIncidente;


/**
 * SubclaseIncidenteSearch represents the model behind the search form about `app\models\SubclaseIncidente`.
 */
class SubclaseIncidenteSearch extends SubclaseIncidente
{
    public $claseName;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['subclase_incidente_id', 'clase_incidente_id'], 'integer'],
            [['subclase_incidente_nombre'], 'safe'],
            [['claseName'],'safe'],
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
        $query = SubclaseIncidente::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $dataProvider->setSort([
                'attributes'=>[
                    'subclase_incidente_nombre',
                    'claseName'=>[
                        'asc'=>['clase_incidente.clase_incidente_nombre'=>SORT_ASC],
                        'desc'=>['clase_incidente.clase_incidente_nombre'=>SORT_DESC],
                        'label'=>'Clase de incidente'

                    ],
                ]
            ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to any records when validation fails
            // $query->where('0=1');
            $query->joinWith('claseIncidente');

            return $dataProvider;
        }

        $query->andFilterWhere([
            'subclase_incidente_id' => $this->subclase_incidente_id,
            'clase_incidente_id' => $this->clase_incidente_id,
        ]);

        $query->andFilterWhere(['like', 'subclase_incidente_nombre', $this->subclase_incidente_nombre]);
        $query->andFilterWhere(['clase_incidente_id' => $this->clase_incidente_id]);

        $query->joinWith(['claseIncidente'=>function ($q) 
        {
            if(!empty($this->claseName))
            $q->where('clase_incidente.clase_incidente_nombre LIKE "%' . 
            $this->claseName . '%"');
        }]);


        return $dataProvider;
    }
}
