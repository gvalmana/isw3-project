<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\NcAudit;

/**
 * NcAuditSearch represents the model behind the search form of `app\models\NcAudit`.
 */
class NcAuditSearch extends NcAudit
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'personal_detecta', 'auditor_jefe'], 'integer'],
            [['gravedad'], 'safe'],
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
        $query = NcAudit::find();

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
            'personal_detecta' => $this->personal_detecta,
            'auditor_jefe' => $this->auditor_jefe,
        ]);

        $query->andFilterWhere(['like', 'gravedad', $this->gravedad]);

        return $dataProvider;
    }
}
