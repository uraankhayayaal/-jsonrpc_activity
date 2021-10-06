<?php 

namespace app\modules\api1\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;

class LogSearch extends Log
{
    public function rules()
    {
        return [
            [['url', 'datetime'], 'safe'],
        ];
    }

    public function scenarios()
    {
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = Log::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            return $dataProvider;
        }

        return $dataProvider;
    }

    public function getStats(int $limit, int $offset)
    {
        $query = Log::find()
            ->select(['url, COUNT(*) AS count, max(datetime) as lastVisit'])
            ->groupBy(['url']);

        return [
            'totalCount' => $query->count(),
            'models' => $query->offset($offset)->limit($limit)->asArray()->all(),
        ];
    }
}