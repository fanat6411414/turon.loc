<?php

namespace frontend\widgets\imageShow;

use yii\base\Widget;
use Yii;

class ImageShowWidget extends Widget
{
    public $model;
    public $view = 'index';
    public $url = ['/file-manager/index'];
    public $buttonTitle;

    public function run(){
        $this->model = new Model();
        $this->model->buttonTitle = $this->buttonTitle;
        $this->model->url = $this->url;
        return $this->render($this->view, ['model' => $this->model]);
    }
}

class Model{
    public $url;
    public $buttonTitle;
}