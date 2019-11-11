<?php

namespace app\modules\seguridad\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\seguridad\models\Modelhistory;

/**
 * ModelhistorySearch represents the model behind the search form of `app\models\Modelhistory`.
 */
class ModelhistorySearch extends Modelhistory
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'type'], 'integer'],
            [['date', 'table', 'field_name', 'field_id', 'old_value', 'new_value', 'user_id'], 'safe'],
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
        $query = Modelhistory::find();

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

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'date' => $this->date,
            'type' => $this->type,
        ]);

        $query->andFilterWhere(['like', 'table', $this->table])
            ->andFilterWhere(['like', 'field_name', $this->field_name])
            ->andFilterWhere(['like', 'field_id', $this->field_id])
            ->andFilterWhere(['like', 'old_value', $this->old_value])
            ->andFilterWhere(['like', 'new_value', $this->new_value])
            ->andFilterWhere(['like', 'user_id', $this->user_id]);

        $query->orderBy(['date' => SORT_DESC]);

        return $dataProvider;
    }
}
