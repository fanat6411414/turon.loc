<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "s_qabul_call".
 *
 * @property int $id
 * @property string $alias
 * @property string $title
 * @property string $name
 * @property string $url
 * @property string|null $_tranlate
 * @property int|null $status
 */
class SQabulCall extends \common\models\base\Base
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 's_qabul_call';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['alias', 'title', 'name', 'url'], 'required'],
            [['_tranlate'], 'string'],
            [['status'], 'integer'],
            [['alias', 'title', 'name', 'url'], 'string', 'max' => 255],
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
            'title' => 'Title',
            'name' => 'Name',
            'url' => 'Url',
            '_tranlate' => 'Tranlate',
            'status' => 'Status',
        ];
    }
}
