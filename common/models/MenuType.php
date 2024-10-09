<?php

namespace common\models;

use yii\helpers\Url;

class MenuType extends \common\models\base\SMenu
{
    public static $url = '#';
    public static function getUrl($model)
    {
        switch ($model->type){
            case '2': self::$url = $model->url; break;
            case '3': self::$url = Url::to('/'.$model->action); break;
            case '4': self::$url = Url::to('/site/page?id='.(Pages::findOne($model->page_id)->alias)); break;
        }
        return self::$url;
    }

    public static function getUrlArray($model)
    {
        switch ($model['type']){
            case '2': self::$url = $model['url']; break;
            case '3': self::$url = Url::to('/'.$model['action']); break;
            case '4': self::$url = Url::to('/site/page?id='.(Pages::findOne($model['page_id'])->alias)); break;
        }
        return self::$url;
    }
}