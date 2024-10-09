<?php

namespace frontend\modules\admin\models;

use Yii;
use yii\base\Model;

class LoginForm extends Model
{
    public $username;
    public $password;
    private $_user;
    private $_oneDay = 3600 * 24;

    public function rules()
    {
        return [
            // username and password are both required
            [['username', 'password'], 'required'],

            // password is validated by validatePassword()
            ['password', 'validatePassword'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'username' => 'Login',
            'password' => 'Parol',
        ];
    }

    public function validatePassword($attribute, $params)
    {
        if (!$this->hasErrors()) {
            $user = $this->getUser();
            if (!$user || !$user->validatePassword($this->password)) {
                $this->addError($attribute, 'Login yoki parol xato.');
            }
        }
    }

    public function login()
    {
        if ($this->validate()) {
            return Yii::$app->user->login($this->getUser(), $this->_oneDay);
        }
        return false;
    }

    protected function getUser()
    {
        if ($this->_user === null){
            $this->_user = Auth::findByUsername($this->username);
        }
        return $this->_user;
    }
}