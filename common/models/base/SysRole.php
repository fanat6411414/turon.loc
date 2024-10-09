<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "sys_role".
 *
 * @property int $id
 * @property string $name
 *
 * @property SysRoleAction[] $sysRoleActions
 * @property SysUser[] $sysUsers
 */
class SysRole extends \common\models\base\Base
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'sys_role';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 255],
            [['name'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
        ];
    }

    /**
     * Gets query for [[SysRoleActions]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSysRoleActions()
    {
        return $this->hasMany(SysRoleAction::class, ['role_id' => 'id']);
    }

    /**
     * Gets query for [[SysUsers]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSysUsers()
    {
        return $this->hasMany(SysUser::class, ['role_id' => 'id']);
    }
}
