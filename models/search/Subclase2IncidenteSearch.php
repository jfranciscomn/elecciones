<?php

namespace app\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Subclase2Incidente;

/**
 * Subclase2IncidenteSearch represents the model behind the search form about `app\models\Subclase2Incidente`.
 */
class Subclase2IncidenteSearch extends Subclase2Incidente
{
        public $claseName;
        public $subclaseName;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['subclase2_incidente_id', 'subclase_incidente_id', 'clase_incidente_id'], 'integer'],
            [['subclase2_incidente_nombre'], 'safe'],
            [['claseName'],'safe'],
            [['subclaseName'],'safe'],
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
        $query = Subclase2Incidente::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $dataProvider->setSort([
                'attributes'=>[
                    'subclase2_incidente_nombre',
                    'claseName'=>[
                        'asc'=>['clase_incidente.clase_incidente_nombre'=>SORT_ASC],
                        'desc'=>['clase_incidente.clase_incidente_nombre'=>SORT_DESC],
                        'label'=>'Clase de incidente'

                    ],
                    'subclaseName'=>[
                        'asc'=>['subclase_incidente.subclase_incidente_nombre'=>SORT_ASC],
                        'desc'=>['subclase_incidente.subclase_incidente_nombre'=>SORT_DESC],
                        'label'=>'Subclase de incidente'

                    ],
                ]
            ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to any records when validation fails
            // $query->where('0=1');
            $query->joinWith('claseIncidente');
            $query->joinWith('subclaseIncidente');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'subclase2_incidente_id' => $this->subclase2_incidente_id,
            'subclase_incidente_id' => $this->subclase_incidente_id,
            'clase_incidente_id' => $this->clase_incidente_id,
        ]);

        $query->andFilterWhere(['like', 'subclase2_incidente_nombre', $this->subclase2_incidente_nombre]);


        $query->joinWith(['claseIncidente'=>function ($q) 
        {
            if(!empty($this->claseName))
            $q->where('clase_incidente.clase_incidente_nombre LIKE "%' . 
            $this->claseName . '%"');
        }]);


        $query->joinWith(['subclaseIncidente'=>function ($q) 
        {
            if(!empty($this->subclaseName))
            $q->where('subclase_incidente.subclase_incidente_nombre LIKE "%' . 
            $this->subclaseName . '%"');
        }]);

        return $dataProvider;
    }
}
