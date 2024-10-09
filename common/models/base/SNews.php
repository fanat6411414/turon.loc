<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "s_news".
 *
 * @property int $id
 * @property string $alias
 * @property string $name
 * @property int|null $image
 * @property string|null $content
 * @property int|null $status
 * @property string|null $_tranlate
 * @property int $created_at
 * @property int|null $updated_at
 * @property int|null $news_type
 *
 * @property SFiles $image0
 * @property SNewsType $newsType
 */
class SNews extends \common\models\base\Base
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 's_news';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['alias', 'name', 'created_at'], 'required'],
            [['image', 'status', 'created_at', 'updated_at', 'news_type'], 'integer'],
            [['content', '_tranlate'], 'string'],
            [['alias', 'name'], 'string', 'max' => 255],
            [['image'], 'exist', 'skipOnError' => true, 'targetClass' => SFiles::class, 'targetAttribute' => ['image' => 'id']],
            [['news_type'], 'exist', 'skipOnError' => true, 'targetClass' => SNewsType::class, 'targetAttribute' => ['news_type' => 'id']],
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
            'image' => 'Image',
            'content' => 'Content',
            'status' => 'Status',
            '_tranlate' => 'Tranlate',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'news_type' => 'News Type',
        ];
    }

    /**
     * Gets query for [[Image0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getImage0()
    {
        return $this->hasOne(SFiles::class, ['id' => 'image']);
    }

    /**
     * Gets query for [[NewsType]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getNewsType()
    {
        return $this->hasOne(SNewsType::class, ['id' => 'news_type']);
    }
}
