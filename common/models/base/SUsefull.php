<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "s_usefull".
 *
 * @property int $id
 * @property string $alias
 * @property string $name
 * @property int $img_id
 * @property int|null $position
 * @property string $url
 * @property string|null $_tranlate
 */
class SUsefull extends \common\models\base\Base
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 's_usefull';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['alias', 'name', 'img_id', 'url'], 'required'],
            [['img_id', 'position'], 'integer'],
            [['_tranlate'], 'string'],
            [['alias', 'name', 'url'], 'string', 'max' => 255],
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
            'img_id' => 'Img ID',
            'position' => 'Position',
            'url' => 'Url',
            '_tranlate' => 'Tranlate',
        ];
    }
}
