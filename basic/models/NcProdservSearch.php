<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\NcProdserv;

/**
 * NcProdservSearch represents the model behind the search form of `app\models\NcProdserv`.
 */
class NcProdservSearch extends NcProdserv
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'agencia', 'no_pax', 'receptor'], 'integer'],
            [['modalidad_turistica', 'procedencia', 'producto', 'pais', 'mercado', 'nombre_cliente', 'no_reserva'], 'safe'],
            [['costo_nocalidad'], 'number'],
        ];
    }

    /**
     * {@inheritdoc}
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
        $query = NcProdserv::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'agencia' => $this->agencia,
            'no_pax' => $this->no_pax,
            'costo_nocalidad' => $this->costo_nocalidad,
            'receptor' => $this->receptor,
        ]);

        $query->andFilterWhere(['like', 'modalidad_turistica', $this->modalidad_turistica])
            ->andFilterWhere(['like', 'procedencia', $this->procedencia])
            ->andFilterWhere(['like', 'producto', $this->producto])
            ->andFilterWhere(['like', 'pais', $this->pais])
            ->andFilterWhere(['like', 'mercado', $this->mercado])
            ->andFilterWhere(['like', 'nombre_cliente', $this->nombre_cliente])
            ->andFilterWhere(['like', 'no_reserva', $this->no_reserva]);

        return $dataProvider;
    }
}
