<?php

namespace common\models;

use Yii;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Json;

class News extends \common\models\base\SNews
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
            [['alias', 'name', 'created_at', 'status', 'news_type'], 'required', 'on' => [self::SCENARIO_ADD, self::SCENARIO_EDIT]],
            [['nameUz', 'nameRu', 'nameEn'], 'string', 'max' => 255],
            [['contentUz', 'contentRu', 'contentEn'], 'string'],
            [['image'], 'in', 'range' => ArrayHelper::map(Files::find()->all(), 'id', 'id')],
        ]);
    }

    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'alias' => Yii::t('app', 'Alias'),
            'name' => Yii::t('app', 'Name'),
            'image' => Yii::t('app', 'Image'),
            'content' => Yii::t('app', 'Content'),
            'status' => Yii::t('app', 'Status'),
            '_tranlate' => Yii::t('app', 'Translate'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'news_type' => Yii::t('app', 'News Type'),
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
        if($this->content) str_replace('%Powered by Froala Editor%', '', $this->content);
        if($this->contentUz) str_replace('%Powered by Froala Editor%', '', $this->contentUz);
        if($this->contentRu) str_replace('%Powered by Froala Editor%', '', $this->contentRu);
        if($this->contentEn) str_replace('%Powered by Froala Editor%', '', $this->contentEn);
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

    public function getContent($lang = null){
        if($lang == null){ $lang = Yii::$app->language; }
        try {
            $model = Json::decode($this->_tranlate);
            if(isset($model['content'][$lang]) && !empty($model['content'][$lang])){
                return $model['content'][$lang];
            }
        } catch (\Exception $e){
            return $this->content;
        }
        return $this->content;
    }

    public function getType($code = false)
    {
        if ($code) {
            return NewsType::findOne($code)->getName();
        }
        return ArrayHelper::map(NewsType::find()
            ->orderBy(['name' => SORT_ASC])
            ->all(), 'id', 'name');
    }

    public function getImg()
    {
        return $this->hasOne(Files::class, ['id' => 'image']);
    }
}