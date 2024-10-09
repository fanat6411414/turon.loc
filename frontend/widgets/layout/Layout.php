<?php

namespace frontend\widgets\layout;

use common\models\SysConfig;
use yii\bootstrap5\Widget;

class Layout extends Widget
{
    public $config;
    public $model = null;
    public $view;

    public function run(){
        $this->config = SysConfig::findOne(1);
        return $this->render($this->view, [
            'config' => $this->config,
            'model' => $this->model
        ]);
    }
}