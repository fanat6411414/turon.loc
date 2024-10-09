<?php

namespace common\models;

class SysRole extends \common\models\base\SysRole
{
    public function rules()
    {
        return array_merge(parent::rules(), []);
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
        ];
    }
}