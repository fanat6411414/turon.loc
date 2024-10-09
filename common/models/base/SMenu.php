<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "s_menu".
 *
 * @property int $id
 * @property string $alias
 * @property string $name
 * @property int $parent
 * @property int|null $type
 * @property int|null $page_id
 * @property string|null $action
 * @property string|null $url
 * @property string|null $_tranlate
 * @property int|null $status
 *
 * @property SPages $page
 */
class SMenu extends \common\models\base\Base
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 's_menu';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['alias', 'name', 'parent'], 'required'],
            [['parent', 'type', 'page_id', 'status'], 'integer'],
            [['_tranlate'], 'string'],
            [['alias', 'name', 'action', 'url'], 'string', 'max' => 255],
            [['page_id'], 'exist', 'skipOnError' => true, 'targetClass' => SPages::class, 'targetAttribute' => ['page_id' => 'id']],
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
            'parent' => 'Parent',
            'type' => 'Type',
            'page_id' => 'Page ID',
            'action' => 'Action',
            'url' => 'Url',
            '_tranlate' => 'Tranlate',
            'status' => 'Status',
        ];
    }

    /**
     * Gets query for [[Page]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPage()
    {
        return $this->hasOne(SPages::class, ['id' => 'page_id']);
    }
}
