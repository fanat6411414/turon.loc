<?php

namespace common\models;

class SysUser extends \common\models\base\SysUser
{
    public function rules()
    {
        return array_merge(parent::rules(), []);
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'login' => 'Login',
            'auth_key' => 'Auth Key',
            'password_hash' => 'Password Hash',
            'password_reset_token' => 'Password Reset Token',
            'status' => 'Status',
            'role_id' => 'Role ID',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'uid' => 'Uid',
            '_name' => 'Name',
            '_phone' => 'Phone',
            'descreptions' => 'Descreptions',
        ];
    }
}