<?php

namespace app\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Municipio;

/**
 * MunicipioSearch represents the model behind the search form about `app\models\Municipio`.
 */
class MunicipioSearch extends Municipio
{
    public $zonaName;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        
        return [
            [['municipio_id', 'zona_id'], 'integer'],
            [['municipio_nombre'], 'safe'],
            [['zonaName'],'safe'],
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
        $query = Municipio::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        
        $dataProvider->setSort([
                'attributes'=>[
                    'municipio_nombre',
                    'zonaName'=>[
                        'asc'=>['zona.zona_nombre'=>SORT_ASC],
                        'desc'=>['zona.zona_nombre'=>SORT_DESC],
                        'label'=>'Zona'

                    ],
                ]
            ]);

        $this->load($params);

        if (!$this->validate()) {

            $query->joinWith('zona');
            // uncomment the following line if you do not want to any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'municipio_id' => $this->municipio_id,
            'zona_id' => $this->zona_id,
        ]);

        $query->andFilterWhere(['zona_id' => $this->zona_id]);

        $query->andFilterWhere(['like', 'municipio_nombre', $this->municipio_nombre]);

        if(!empty($this->zonaName))
        $query->joinWith(['zona'=>function ($q) 
        {
            $q->where('zona.zona_nombre LIKE "%' . 
            $this->zonaName . '%"');
        }]);

        return $dataProvider;
    }
}
