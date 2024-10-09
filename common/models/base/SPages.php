<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "s_pages".
 *
 * @property int $id
 * @property string $alias
 * @property string $name
 * @property string|null $content
 * @property int|null $status
 * @property string|null $_tranlate
 * @property int $created_at
 * @property int|null $updated_at
 *
 * @property SMenuFooter[] $sMenuFooters
 * @property SMenu[] $sMenus
 */
class SPages extends \common\models\base\Base
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 's_pages';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['alias', 'name', 'created_at'], 'required'],
            [['content', '_tranlate'], 'string'],
            [['status', 'created_at', 'updated_at'], 'integer'],
            [['alias', 'name'], 'string', 'max' => 255],
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
            'content' => 'Content',
            'status' => 'Status',
            '_tranlate' => 'Tranlate',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * Gets query for [[SMenuFooters]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSMenuFooters()
    {
        return $this->hasMany(SMenuFooter::class, ['page_id' => 'id']);
    }

    /**
     * Gets query for [[SMenus]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSMenus()
    {
        return $this->hasMany(SMenu::class, ['page_id' => 'id']);
    }
}
