<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "s_kafedra".
 *
 * @property int $id
 * @property string $alias
 * @property string $name
 * @property int|null $manager_id
 * @property int|null $fakulty_id
 * @property string|null $about
 * @property string|null $_tranlate
 *
 * @property SFakulty $fakulty
 * @property SManagers $manager
 */
class SKafedra extends \common\models\base\Base
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 's_kafedra';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['alias', 'name'], 'required'],
            [['manager_id', 'fakulty_id'], 'integer'],
            [['about', '_tranlate'], 'string'],
            [['alias', 'name'], 'string', 'max' => 255],
            [['fakulty_id'], 'exist', 'skipOnError' => true, 'targetClass' => SFakulty::class, 'targetAttribute' => ['fakulty_id' => 'id']],
            [['manager_id'], 'exist', 'skipOnError' => true, 'targetClass' => SManagers::class, 'targetAttribute' => ['manager_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'alias' => 'Alias',
            'name' => 'Name',
            'manager_id' => 'Manager ID',
            'fakulty_id' => 'Fakulty ID',
            'about' => 'About',
            '_tranlate' => 'Tranlate',
        ];
    }

    /**
     * Gets query for [[Fakulty]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFakulty()
    {
        return $this->hasOne(SFakulty::class, ['id' => 'fakulty_id']);
    }

    /**
     * Gets query for [[Manager]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getManager()
    {
        return $this->hasOne(SManagers::class, ['id' => 'manager_id']);
    }
}
