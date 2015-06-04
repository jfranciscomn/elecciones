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
    public $municipioName;
    public $sindicaturaName;
    public $poblacionName;
    public $coloniaName;
    public $claseName;
    public $lugarName;
    public $subclaseName;
    public $subclase2Name;
    public $usuarioName;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['incidente_id', 'colonia_id', 'poblacion_id', 'sindicatura_id', 'municipio_id', 'operativo_id', 'subclase2_incidente_id', 'subclase_incidente_id', 'clase_incidente_id', 'usuario_id'], 'integer'],
            [['fecha'], 'safe'],
            [['municipioName'],'safe'],
            [['sindicaturaName'],'safe'],
            [['poblacionName'],'safe'],
            [['coloniaName'],'safe'],
            [['lugarName'],'safe'],
            [['claseName'],'safe'],
            [['subclaseName'],'safe'],
            [['subclase2Name'],'safe'],
            [['usuarioName'],'safe'],
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
        $dataProvider->setSort([
                'attributes'=>[
                    'incidente_id', 
                    'fecha',
                    'municipioName'=>[
                        'asc'=>['municipio.municipio_nombre'=>SORT_ASC],
                        'desc'=>['municipio.municipio_nombre'=>SORT_DESC],
                        'label'=>'Municipio'
                    ],
                 
                    'poblacionName'=>[
                        'asc'=>['poblacion.poblacion_nombre'=>SORT_ASC],
                        'desc'=>['poblacion.poblacion_nombre'=>SORT_DESC],
                        'label'=>'Poblacion'
                    ],
                    'coloniaName'=>[
                        'asc'=>['colonia.colonia_nombre'=>SORT_ASC],
                        'desc'=>['colonia.colonia_nombre'=>SORT_DESC],
                        'label'=>'colonia'
                    ],
                    'claseName'=>[
                        'asc'=>['clase_incidente.clase_incidente_nombre'=>SORT_ASC],
                        'desc'=>['clase_incidente.clase_incidente_nombre'=>SORT_DESC],
                        'label'=>'Incidente'
                    ],
                    'lugarName'=>[
                        'asc'=>['lugar.lugar_nombre'=>SORT_ASC],
                        'desc'=>['lugar.lugar_nombre'=>SORT_DESC],
                        'label'=>'Lugar'
                    ],
                    'subclaseName'=>[
                        'asc'=>['subclase_incidente.subclase_incidente_nombre'=>SORT_ASC],
                        'desc'=>['subclase_incidente.subclase_incidente_nombre'=>SORT_DESC],
                        'label'=>'Datalle Incidente'
                    ],
                   
                    'usuarioName'=>[
                        'asc'=>['usuario.usuario_nombre'=>SORT_ASC],
                        'desc'=>['usuario.usuario_nombre'=>SORT_DESC],
                        'label'=>'Datalle Incidente'
                    ],
                ]
            ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to any records when validation fails
            // $query->where('0=1');
            $query->joinWith('municipio');
            $query->joinWith('sindicatura');
            $query->joinWith('poblacion');
            $query->joinWith('coloniaName');
            $query->joinWith('claseIncidente');
            $query->joinWith('lugar');
            $query->joinWith('subclaseName');
            $query->joinWith('subclase2Name');
            $query->joinWith('usuarioName');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'municipio.incidente_id' => $this->incidente_id,
            'municipio.colonia_id' => $this->colonia_id,
            'municipio.poblacion_id' => $this->poblacion_id,
            'municipio.sindicatura_id' => $this->sindicatura_id,
            'municipio.municipio_id' => $this->municipio_id,
            'municipio.operativo_id' => $this->operativo_id,
            'municipio.subclase2_incidente_id' => $this->subclase2_incidente_id,
            'municipio.subclase_incidente_id' => $this->subclase_incidente_id,
            'municipio.clase_incidente_id' => $this->clase_incidente_id,
            'municipio.fecha' => $this->fecha,
            'municipio.usuario_id' => $this->usuario_id,            
            'municipio.lugar_id' => $this->lugar_id,

        ]);

        $query->joinWith(['municipio'=>function ($q) 
        {
            if(!empty($this->municipioName))
            $q->where('municipio.municipio_nombre LIKE "%' . 
            $this->municipioName . '%"');
        }]);
        //Join Sindicatura
        
        //Join Poblacion

        
        $query->joinWith(['poblacion'=>function ($q) 
        {
            if(!empty($this->poblacionName))
            $q->where('poblacion.poblacion_nombre LIKE "%' . 
            $this->poblacionName . '%"');
        }]);
        //Join Tipo de lugar

        
        $query->joinWith(['colonia'=>function ($q) 
        {
            if(!empty($this->coloniaName))
            $q->where('colonia.colonia_nombre LIKE "%' . 
            $this->coloniaName . '%"');
        }]);

        $query->joinWith(['claseIncidente'=>function ($q) 
        {
            if(!empty($this->claseName))
            $q->where('clase_incidente.clase_incidente_nombre LIKE "%' . 
            $this->claseName . '%"');
        }]);

        $query->joinWith(['lugar'=>function ($q) 
        {
            if(!empty($this->lugarName))
            $q->where('lugar.lugar_nombre LIKE "%' . 
            (empty($this->lugarName)? '':$this->lugarName). '%"');
        }]);

        $query->joinWith(['subclaseIncidente'=>function ($q) 
        {  
            if(!empty($this->subclaseName))
            $q->where('subclase_incidente.subclase_incidente_nombre LIKE "%' . 
            (empty($this->subclaseName)? '':$this->subclaseName) . '%"');
        }]);

   
        
        $query->joinWith(['usuario'=>function ($q) 
        {
            if(!empty($this->usuairoName))
            $q->where('usuario.usuario_nombre LIKE "%' . 
            (empty($this->usuairoName)? '':$this->usuairoName). '%"');
        }]);





        return $dataProvider;
    }
}
