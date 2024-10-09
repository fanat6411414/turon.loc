<?php

namespace common\models;

class SysActions extends \common\models\base\SysActions
{
    public function rules()
    {
        return array_merge(parent::rules(), []);
    }

    public function attributeLabels()
    {
        return [
            'id' => 'T/R',
            'name' => 'Nomi',
            'path' => 'Path',
        ];
    }
}