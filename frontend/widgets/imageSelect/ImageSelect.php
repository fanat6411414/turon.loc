<?php

namespace frontend\widgets\imageSelect;

use yii\bootstrap5\Widget;

class ImageSelect extends Widget
{
    public $model;
    public $data = [];
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