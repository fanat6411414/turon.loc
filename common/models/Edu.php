<?php

namespace common\models;

use Yii;
use yii\helpers\Json;

class Edu extends \common\models\base\SEdu
{
    public $nameUz;
    public $nameRu;
    public $nameEn;

    public $descUz;
    public $descRu;
    public $descEn;

    public function rules()
    {
        $parentRules = parent::rules();
        unset($parentRules[0]);
        return array_merge($parentRules, [
            [
                ['alias', 'name', 'desc', 'summ_kunduzgi', 'summ_sirtqi', 'status'],
                'required', 'on' => [self::SCENARIO_ADD, self::SCENARIO_EDIT]
            ],
            [['nameUz', 'nameRu', 'nameEn', 'descUz', 'descRu', 'descEn'], 'string', 'max' => 255],
        ]);
    }

    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'alias' => Yii::t('app', 'Alias'),
            'name' => Yii::t('app', 'Name'),
            'desc' => Yii::t('app', 'Description'),
            'summ_kunduzgi' => Yii::t('app', 'Summ Kunduzgi'),
            'summ_sirtqi' => Yii::t('app', 'Summ Sirtqi'),
            'type_edu' => Yii::t('app', 'Type Edu'),
            'status' => Yii::t('app', 'Status'),
        ];
    }

    public function _save()
    {
        if($this->isNewRecord){
            $this->alias = time().Yii::$app->getSecurity()->generateRandomString(6);
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
        $transaction['desc'] = [
            'uz' => $this->descUz,
            'ru' => $this->descRu,
            'en' => $this->descEn,
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
        if(!empty($transaction['desc'])){
            if(isset($transaction['desc']['uz'])) $this->descUz = $transaction['desc']['uz'];
            if(isset($transaction['desc']['ru'])) $this->descRu = $transaction['desc']['ru'];
            if(isset($transaction['desc']['en'])) $this->descEn = $transaction['desc']['en'];
        }
    }

    public function getEduType($code=false)
    {
        $list = [
            self::STATUS_INACTIVE => Yii::t('app', 'Bakalavr'),
            self::STATUS_ACTIVE => Yii::t('app', 'Magistr'),
        ];
        if($code){
            return isset($list[$code])?$list[$code]:null;
        }
        return $list;
    }

    public function getName($lang = null){
        if($lang == null){ $lang = Yii::$app->language; }
        try {
            $model = Json::decode($this->_tranlate);
            if(isset($model['name'][$lang]) && !empty($model['name'][$lang])){
                return $model['name'][$lang];
            }
        } catch (\Exception $e){
            return $this->name;
        }
        return $this->name;
    }

    public function getDesc($lang = null){
        if($lang == null){ $lang = Yii::$app->language; }
        try {
            $model = Json::decode($this->_tranlate);
            if(isset($model['desc'][$lang]) && !empty($model['desc'][$lang])){
                return $model['desc'][$lang];
            }
        } catch (\Exception $e){
            return $this->desc;
        }
        return $this->desc;
    }
}