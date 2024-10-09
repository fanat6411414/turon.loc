<?php

namespace common\models;

use Yii;
use yii\data\ActiveDataProvider;
use yii\helpers\Json;

class Pages extends \common\models\base\SPages
{
    public $nameUz;
    public $nameRu;
    public $nameEn;

    public $contentUz;
    public $contentRu;
    public $contentEn;

    public function rules()
    {
        $parentRules = parent::rules();
        unset($parentRules[0]);
        return array_merge($parentRules, [
            [['alias', 'name', 'created_at'], 'required', 'on' => [self::SCENARIO_ADD, self::SCENARIO_EDIT]],
            [['updated_at'], 'required', 'on' => [self::SCENARIO_EDIT]],
            [['nameUz', 'nameRu', 'nameEn'], 'string', 'max' => 255],
            [['contentUz', 'contentRu', 'contentEn'], 'string'],
        ]);
    }

    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'alias' => Yii::t('app', 'Alias'),
            'name' => Yii::t('app', 'Name'),
            'content' => Yii::t('app', 'Content'),
            'status' => Yii::t('app', 'Status'),
            '_tranlate' => Yii::t('app', 'Translate'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }

    public function _save()
    {
        if($this->isNewRecord){
            $this->alias = time().Yii::$app->getSecurity()->generateRandomString(6);
            $this->created_at = time();
        } else {
            $this->updated_at = time();
        }
        try{
            $transaction = Json::decode($this->_tranlate);
        } catch(\Exception $e){
            $transaction = [];
        }
        $transaction['name'] = [
            'uz' => $this->nameUz,
            'ru' => $this->nameRu,
            'en' => $this->nameEn,
        ];
        $transaction['content'] = [
            'uz' => $this->contentUz,
            'ru' => $this->contentRu,
            'en' => $this->contentEn,
        ];
        $this->_tranlate = Json::encode($transaction);
        return $this->save();
    }

    public function afterFind()
    {
        try{
            $transaction = Json::decode($this->_tranlate);
        } catch(\Exception $e){
            $this->_tranlate = '';
            $this->save();
            $transaction = [];
        }
        if(!empty($transaction['name'])){
            if(isset($transaction['name']['uz'])) $this->nameUz = $transaction['name']['uz'];
            if(isset($transaction['name']['ru'])) $this->nameRu = $transaction['name']['ru'];
            if(isset($transaction['name']['en'])) $this->nameEn = $transaction['name']['en'];
        }
        if(!empty($transaction['content'])){
            if(isset($transaction['content']['uz'])) $this->contentUz = $transaction['content']['uz'];
            if(isset($transaction['content']['ru'])) $this->contentRu = $transaction['content']['ru'];
            if(isset($transaction['content']['en'])) $this->contentEn = $transaction['content']['en'];
        }
    }

    public function search($params)
    {
        $query = self::find();
        $dataProvider = new ActiveDataProvider(['query' => $query]);
        $this->load($params);
        if (!$this->validate()){ return $dataProvider; }

        $query->andFilterWhere([
            'id' => $this->id,
            'status' => $this->status
        ]);
        $query->andFilterWhere(['like', 'name', $this->name]);
        return $dataProvider;
    }
}