<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Noconformidad;

/**
 * NoconformidadSearch represents the model behind the search form of `app\models\Noconformidad`.
 */
class NoconformidadSearch extends Noconformidad
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'id_areainterna'], 'integer'],
            [['codigo', 'fecha_identificacion', 'descripcion', 'tipo_nc', 'normas_afectadas', 'fecha_entrada', 'fecha_termino', 'evidencias'], 'safe'],
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
        $query = Noconformidad::find();

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
            'fecha_identificacion' => $this->fecha_identificacion,
            'fecha_entrada' => $this->fecha_entrada,
            'fecha_termino' => $this->fecha_termino,
            'id_areainterna' => $this->id_areainterna,
        ]);

        $query->andFilterWhere(['like', 'codigo', $this->codigo])
            ->andFilterWhere(['like', 'descripcion', $this->descripcion])
            ->andFilterWhere(['like', 'tipo_nc', $this->tipo_nc])
            ->andFilterWhere(['like', 'normas_afectadas', $this->normas_afectadas])
            ->andFilterWhere(['like', 'evidencias', $this->evidencias]);

        return $dataProvider;
    }
}
