<?php

namespace frontend\widgets\menu;

use common\models\Cache;
use Yii;
use yii\base\Widget;

class Menu extends Widget {

    public $view = 'layout';
    public $data;
    public $tree;

    public function run(){
        $cache = Yii::$app->cache->get('menu');
        if(empty($cache[Yii::$app->language])) {
            $model = new Cache();
            $model->setAllMenu();
            $cache = Yii::$app->cache->get('menu');
        }
        return $this->render($this->view, ['menu' => $cache[Yii::$app->language]]);
    }
}