<?php

namespace common\models;

use common\models\base\SManagers;
use Yii;
use yii\helpers\ArrayHelper;
use yii\helpers\Json;

class Manager extends \common\models\base\SManager
{
    public $nameUz;
    public $nameRu;
    public $nameEn;

    public $aboutUz;
    public $aboutRu;
    public $aboutEn;
    public function rules()
    {
        $parentRules = parent::rules();
        unset($parentRules[0]);
        return array_merge($parentRules, [
            [
                ['alias', 'name', 'manager_id', 'position'], 'required', 'on' => [self::SCENARIO_ADD, self::SCENARIO_EDIT]
            ],
            [['nameUz', 'nameRu', 'nameEn'], 'string', 'max' => 255],
            [['aboutUz', 'aboutRu', 'aboutEn'], 'string', 'max' => 65500],
        ]);
    }

    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'alias' => Yii::t('app', 'Alias'),
            'name' => Yii::t('app', 'Name'),
            'manager_id' => Yii::t('app', 'Manager ID'),
            'about' => Yii::t('app', 'About'),
            'position' => Yii::t('app', 'Position'),
            '_tranlate' => Yii::t('app', 'Tranlate'),
        ];
    }

    public function _save()
    {
        if($this->isNewRecord){
            $this->alias = time() . Yii::$app->getSecurity()->generateRandomString(6);
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
        $transaction['about'] = [
            'uz' => $this->aboutUz,
            'ru' => $this->aboutRu,
            'en' => $this->aboutEn,
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

    public function getAbout($lang = null){
        if($lang == null){ $lang = Yii::$app->language; }
        try {
            $model = Json::decode($this->_tranlate);
            if(isset($model['about'][$lang]) && !empty($model['about'][$lang])){
                return $model['about'][$lang];
            }
        } catch (\Exception $e){
            return $this->about;
        }
        return $this->about;
    }

    public function getManagerList($code=false)
    {
        if($code){
            return Managers::findOne($code);
        }
        return ArrayHelper::map(Managers::find()->all(), 'id', 'name');
    }

    public function getManager()
    {
        return $this->hasOne(Managers::class, ['id' => 'manager_id']);
    }
}