<?php

namespace frontend\widgets\news;

use common\models\base\Base;
use yii\base\Widget;

class News extends Widget {

    public $view = 'index';
    public $models;
    public $limit = 9;
    public $sort = ['id' => SORT_DESC];

    public function run(){
        $this->models = \common\models\News::find()->where(['status' => Base::STATUS_ACTIVE])
            ->orderBy($this->sort)
            ->limit($this->limit)
            ->all();
        return $this->render('layout', [
            'view' => $this->view,
            'models' => $this->models
        ]);
    }
}