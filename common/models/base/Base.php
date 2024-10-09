<?php

namespace common\models\base;

use Yii;
use yii\data\ActiveDataProvider;

class Base extends \yii\db\ActiveRecord
{
    const STATUS_DELETED = 0;
    const STATUS_INACTIVE = 9;
    const STATUS_ACTIVE = 10;

    const SCENARIO_ADD = 'add';
    const SCENARIO_EDIT = 'edit';
    const SCENARIO_UPLOAD = 'upload';

    public function getStatus($code=false, $type=false)
    {
        $list = [
            self::STATUS_INACTIVE => Yii::t('app', 'Inactive'),
            self::STATUS_ACTIVE => Yii::t('app', 'Active'),
        ];
        if($type) $list = array_merge($list, [
            self::STATUS_DELETED => Yii::t('app', 'Deleted')
        ]);
        if($code){
            return isset($list[$code])?$list[$code]:null;
        }
        return $list;
    }

    public function search($params)
    {
        $query = self::find();
        $dataProvider = new ActiveDataProvider(['query' => $query]);
        $this->load($params);
        if (!$this->validate()){ return $dataProvider; }
        $query->andFilterWhere(['id' => $this->id]);
        $query->andFilterWhere(['like', 'name', $this->name]);
        return $dataProvider;
    }
}
