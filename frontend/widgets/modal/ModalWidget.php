<?php

namespace frontend\widgets\modal;

use yii\base\Widget;
use Yii;

class ModalWidget extends Widget
{
    public $id;
    public $size = '';
    public $title = 'Modal title';
    public $content = '<p>One fine body…</p>';
    public $class = 'bg-default';
    public $view = 'index';

    public function run(){

        return $this->render($this->view, [
            'id' => $this->id,
            'class' => $this->class,
            'size' => $this->size,
            'title' => $this->title,
            'content' => $this->content,
        ]);
    }
}