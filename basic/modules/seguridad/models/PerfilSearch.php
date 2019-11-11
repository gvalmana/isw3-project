<?php

namespace app\modules\seguridad\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\seguridad\models\Perfil;

/**
 * PerfilSearch represents the model behind the search form of `app\modules\seguridad\models\Perfil`.
 */
class PerfilSearch extends Perfil
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id','nombre', 'primer_apellido', 'segundo_apellido'], 'safe'],
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
        $query = Perfil::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => ['defaultOrder' => ['id' => SORT_DESC]]
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->joinWith('usuario');

        // grid filtering conditions
        $query->andFilterWhere([
            //'id' => $this->id,
        ]);

        $query->andFilterWhere(['like', 'nombre', $this->nombre])
            ->andFilterWhere(['like', 'user.username', $this->id])
            ->andFilterWhere(['like', 'primer_apellido', $this->primer_apellido])
            ->andFilterWhere(['like', 'segundo_apellido', $this->segundo_apellido]);

        return $dataProvider;
    }
}
