<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Compra;

/**
 * CompraSearch represents the model behind the search form of `app\models\Compra`.
 */
class CompraSearch extends Compra
{
    /**
     * {@inheritdoc}
     */
    public function attributes()
   {      
       return array_merge(parent::attributes(), ['cliente.nome']);
   }


    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['data','cliente.nome'], 'safe'],
            [['valortotal'], 'number'],
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
        $query = Compra::find()->orderBy(['data' => SORT_DESC]);

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $query->joinWith(['cliente'])->orderBy('data');
        $dataProvider->sort->attributes['cliente.nome'] = [
            'asc' => ['cliente.nome' => SORT_ASC],
            'desc' => ['cliente.nome' => SORT_DESC],
        ];


        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'data' => $this->data,
            'valortotal' => $this->valortotal,
            'cliente_fk' => $this->cliente_fk,
        ]);

        $query->andFilterWhere([
            'LIKE',
            'cliente.nome',
            $this->getAttribute('cliente.nome')
        ]);

        return $dataProvider;
    }
}
