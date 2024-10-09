<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "sys_user".
 *
 * @property int $id
 * @property string $login
 * @property string $auth_key
 * @property string $password_hash
 * @property string|null $password_reset_token
 * @property int $status
 * @property int $role_id
 * @property int $created_at
 * @property int|null $updated_at
 * @property string|null $uid
 * @property string $_name
 * @property string|null $_phone
 * @property string|null $descreptions
 *
 * @property SysRole $role
 */
class SysUser extends \common\models\base\Base
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'sys_user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['login', 'auth_key', 'password_hash', 'role_id', 'created_at', '_name'], 'required'],
            [['status', 'role_id', 'created_at', 'updated_at'], 'integer'],
            [['descreptions'], 'string'],
            [['login', 'password_hash', 'password_reset_token', 'uid', '_name', '_phone'], 'string', 'max' => 255],
            [['auth_key'], 'string', 'max' => 32],
            [['login'], 'unique'],
            [['password_reset_token'], 'unique'],
            [['role_id'], 'exist', 'skipOnError' => true, 'targetClass' => SysRole::class, 'targetAttribute' => ['role_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
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

    /**
     * Gets query for [[Role]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRole()
    {
        return $this->hasOne(SysRole::class, ['id' => 'role_id']);
    }
}
