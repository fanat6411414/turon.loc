<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "sys_role_action".
 *
 * @property int|null $role_id
 * @property int|null $actions_id
 *
 * @property SysActions $actions
 * @property SysRole $role
 */
class SysRoleAction extends \common\models\base\Base
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'sys_role_action';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['role_id', 'actions_id'], 'integer'],
            [['actions_id'], 'exist', 'skipOnError' => true, 'targetClass' => SysActions::class, 'targetAttribute' => ['actions_id' => 'id']],
            [['role_id'], 'exist', 'skipOnError' => true, 'targetClass' => SysRole::class, 'targetAttribute' => ['role_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'role_id' => 'Role ID',
            'actions_id' => 'Actions ID',
        ];
    }

    /**
     * Gets query for [[Actions]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getActions()
    {
        return $this->hasOne(SysActions::class, ['id' => 'actions_id']);
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
