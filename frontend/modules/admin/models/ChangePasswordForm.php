<?php

namespace frontend\modules\admin\models;

use kartik\password\StrengthValidator;
use Yii;
use yii\base\InvalidParamException;
use common\models\User;

class ChangePasswordForm extends User
{
    public $old_password;
    public $password;
    public $confirm_password;

    public function rules()
    {
        return [
            [['old_password','password','confirm_password'], 'required'],
            [['old_password','password','confirm_password'], 'string', 'min' => 6],
            ['confirm_password', 'compare', 'compareAttribute' => 'password'],
            [['password'], StrengthValidator::className(), 'preset' => 'normal', 'userAttribute' => 'login', 'message' => 'Parol kamida bitta kichik va katta harf va raqamdan iborat bo‘lishi kerak'],
        ];
    }

    public function changePassword()
    {
        if(!$this->validatePassword($this->old_password)){
            $this->addError('old_password', 'Parol xato');
            return false;
        }
        $this->setPassword($this->password);
        return $this->save(false);
    }
}