<?php

namespace common\models;

use Yii;
use yii\helpers\ArrayHelper;
use yii\helpers\Json;

class Kafedra extends \common\models\base\SKafedra
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
                ['alias', 'name'], 'required', 'on' => [self::SCENARIO_ADD, self::SCENARIO_EDIT]
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
            'fakulty_id' => Yii::t('app', 'Fakulty ID'),
            'about' => Yii::t('app', 'About'),
            '_tranlate' => Yii::t('app', 'Tranlate'),
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

        if(!empty($transaction['about'])){
            if(isset($transaction['about']['uz'])) $this->aboutUz = $transaction['about']['uz'];
            if(isset($transaction['about']['ru'])) $this->aboutRu = $transaction['about']['ru'];
            if(isset($transaction['about']['en'])) $this->aboutEn = $transaction['about']['en'];
        }
    }

    public function getFakultyList($code=false)
    {
        if($code){
            return Fakulty::findOne($code);
        }
        return ArrayHelper::map(Fakulty::find()->all(), 'id', 'name');
    }

    public function getManagerList($code=false)
    {
        if($code){
            return Managers::findOne($code);
        }
        return ArrayHelper::map(Managers::find()->all(), 'id', 'name');
    }
}