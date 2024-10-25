<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "s_manager".
 *
 * @property int $id
 * @property string $alias
 * @property string $name
 * @property int|null $manager_id
 * @property string|null $about
 * @property int|null $position
 * @property string|null $_tranlate
 *
 * @property SManagers $manager
 */
class SManager extends \common\models\base\Base
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 's_manager';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['alias', 'name'], 'required'],
            [['manager_id', 'position'], 'integer'],
            [['about', '_tranlate'], 'string'],
            [['alias', 'name'], 'string', 'max' => 255],
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
            'about' => 'About',
            'position' => 'Position',
            '_tranlate' => 'Tranlate',
        ];
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
