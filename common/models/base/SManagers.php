<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "s_managers".
 *
 * @property int $id
 * @property string $alias
 * @property string $name
 * @property string $phone
 * @property string $email
 * @property string $visiting_day
 * @property string $about
 * @property string $img
 * @property int $time
 * @property string|null $_tranlate
 */
class SManagers extends \common\models\base\Base
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 's_managers';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['alias', 'name', 'phone', 'email', 'visiting_day', 'about', 'img', 'time'], 'required'],
            [['time'], 'integer'],
            [['_tranlate'], 'string'],
            [['alias', 'name', 'phone', 'email', 'visiting_day', 'about', 'img'], 'string', 'max' => 255],
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
            'phone' => 'Phone',
            'email' => 'Email',
            'visiting_day' => 'Visiting Day',
            'about' => 'About',
            'img' => 'Img',
            'time' => 'Time',
            '_tranlate' => 'Tranlate',
        ];
    }
}
