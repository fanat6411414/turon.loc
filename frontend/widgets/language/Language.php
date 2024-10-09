<?php

namespace frontend\widgets\language;

use Yii;
use yii\base\Widget;

class Language extends Widget {

    public $language = null;

    public function run(){
        if($this->language == null) $this->language = Yii::$app->language;
        return $this->render($this->language);
    }
}