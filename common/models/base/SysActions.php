<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "sys_actions".
 *
 * @property int $id
 * @property string $name
 * @property string $path
 *
 * @property SysRoleAction[] $sysRoleActions
 */
class SysActions extends \common\models\base\Base
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'sys_actions';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'path'], 'required'],
            [['name', 'path'], 'string', 'max' => 255],
            [['path'], 'unique'],
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
            'path' => 'Path',
        ];
    }

    /**
     * Gets query for [[SysRoleActions]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSysRoleActions()
    {
        return $this->hasMany(SysRoleAction::class, ['actions_id' => 'id']);
    }
}
