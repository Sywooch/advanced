<?php

namespace frontend\models;


use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Advertisement;

/**
 * AdvertisementSearch represents the model behind the search form about `app\models\Advertisement`.
 */
class AdvertisementSearch extends Advertisement
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['advertisement_id', 'user_id', 'category_id','status'], 'integer'],
            [['category_related', 'title', 'description', 'country', 'city', 'phone', 'email'], 'safe'],
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
        $query = Advertisement::find();

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
            'advertisement_id' => $this->advertisement_id,
            'user_id' => $this->user_id,
            'category_id' => $this->category_id,
            'status' => 1
        ]);

        $query->andFilterWhere(['like', 'category_related', $this->category_related])
            ->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'country', $this->country])
            ->andFilterWhere(['like', 'city', $this->city])
            ->andFilterWhere(['like', 'phone', $this->phone])
            ->andFilterWhere(['like', 'email', $this->email]);

        return $dataProvider;
    }
}
