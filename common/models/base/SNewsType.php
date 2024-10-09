<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "s_news_type".
 *
 * @property int $id
 * @property string $alias
 * @property string $name
 * @property int|null $status
 * @property string|null $_tranlate
 *
 * @property SNews[] $sNews
 */
class SNewsType extends \common\models\base\Base
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 's_news_type';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['alias', 'name'], 'required'],
            [['status'], 'integer'],
            [['_tranlate'], 'string'],
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
            'status' => 'Status',
            '_tranlate' => 'Tranlate',
        ];
    }

    /**
     * Gets query for [[SNews]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSNews()
    {
        return $this->hasMany(SNews::class, ['news_type' => 'id']);
    }
}
