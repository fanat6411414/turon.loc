<?php

namespace common\models;

use Yii;
use yii\helpers\Json;

class NewsType extends \common\models\base\SNewsType
{
    public $nameUz;
    public $nameRu;
    public $nameEn;

    public function rules()
    {
        $parentRules = parent::rules();
        unset($parentRules[0]);
        return array_merge($parentRules, [
            [['alias', 'name'], 'required', 'on' => [self::SCENARIO_ADD, self::SCENARIO_EDIT]],
            [['nameUz', 'nameRu', 'nameEn'], 'string', 'max' => 255],
        ]);
    }

    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'alias' => Yii::t('app', 'Alias'),
            'name' => Yii::t('app', 'Name'),
            'status' => Yii::t('app', 'Status'),
            '_tranlate' => Yii::t('app', 'Translate'),
        ];
    }

    public function _save()
    {
        if($this->isNewRecord){
            $this->alias = time().Yii::$app->getSecurity()->generateRandomString(6);
        }
        try{
            $translate = Json::decode($this->_tranlate);
        } catch(\Exception $e){
            $translate = [];
        }
        $translate['name'] = [
            'uz' => $this->nameUz,
            'ru' => $this->nameRu,
            'en' => $this->nameEn,
        ];
        $this->_tranlate = Json::encode($translate);
        return $this->save();
    }

    public function afterFind()
    {
        try{
            $translate = Json::decode($this->_tranlate);
        } catch(\Exception $e){
            $this->_tranlate = '';
            $this->save();
            $translate = [];
        }
        if(!empty($translate['name'])){
            if(isset($translate['name']['uz'])) $this->nameUz = $translate['name']['uz'];
            if(isset($translate['name']['ru'])) $this->nameRu = $translate['name']['ru'];
            if(isset($translate['name']['en'])) $this->nameEn = $translate['name']['en'];
        }
    }

    public function getName()
    {
        $value = $this->name;
        switch (Yii::$app->language) {
            case 'uz': if(isset($translate['name']['uz'])) $value = $translate['name']['uz']; break;
            case 'ru': if(isset($translate['name']['ru'])) $value = $translate['name']['ru']; break;
            case 'en': if(isset($translate['name']['en'])) $value = $translate['name']['en']; break;
        }
        return $value;
    }
}