<?php

namespace common\models;

class SysRoleAction extends \common\models\base\SysRoleAction
{
    public function rules()
    {
        return array_merge(parent::rules(), []);
    }

    public function attributeLabels()
    {
        return [
            'role_id' => 'Role ID',
            'actions_id' => 'Actions ID',
        ];
    }
}