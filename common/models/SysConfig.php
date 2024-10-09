<?php

namespace common\models;

use Yii;
use yii\helpers\Json;

class SysConfig extends \common\models\base\SysConfig
{
    public $locationUz;
    public $locationOz;
    public $locationRu;
    public $locationEn;

    public function rules()
    {
        return array_merge(parent::rules(), [
            [['tg_channel', 'fb_channel', 'tw_channel', 'in_channel', 'youtube_channel', 'instagram_channel'], 'url'],
            [['locationUz', 'locationOz', 'locationRu', 'locationEn'], 'string', 'max' => 255],
        ]);
    }

    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'phone' => Yii::t('app', 'Phone'),
            'email' => Yii::t('app', 'Email'),
            'location' => Yii::t('app', 'Location'),
            'file_upload_size' => Yii::t('app', 'File Upload Size'),
            'tg_bot_token' => Yii::t('app', 'Tg Bot Token'),
            'tg_channel' => Yii::t('app', 'Tg Channel'),
            'fb_channel' => Yii::t('app', 'Fb Channel'),
            'tw_channel' => Yii::t('app', 'Tw Channel'),
            'in_channel' => Yii::t('app', 'In Channel'),
            'youtube_channel' => Yii::t('app', 'Youtube Channel'),
            'instagram_channel' => Yii::t('app', 'Instagram Channel'),
            'seo_keywords' => Yii::t('app', 'Seo Keywords'),
            'seo_description' => Yii::t('app', 'Seo Description'),
        ];
    }

    public function _save()
    {
        $this->location = Json::encode([
            'oz' => $this->locationOz,
            'uz' => $this->locationUz,
            'ru' => $this->locationRu,
            'en' => $this->locationEn,
        ]);
        return $this->save();
    }

    public function afterFind()
    {
        try{
            if(isset(Json::decode($this->location)['oz'])) $this->locationOz = Json::decode($this->location)['oz'];
            if(isset(Json::decode($this->location)['uz'])) $this->locationUz = Json::decode($this->location)['uz'];
            if(isset(Json::decode($this->location)['ru'])) $this->locationRu = Json::decode($this->location)['ru'];
            if(isset(Json::decode($this->location)['en'])) $this->locationEn = Json::decode($this->location)['en'];
        } catch(\Exception $e){
            $this->location = '';
            $this->save();
        }
    }

    public function getLocation()
    {
        switch (Yii::$app->language) {
            case 'uz': if($this->locationUz) return $this->locationUz; break;
            case 'ru': if($this->locationRu) return $this->locationRu; break;
            case 'en': if($this->locationEn) return $this->locationEn; break;
        }
        return $this->locationOz;
    }
}