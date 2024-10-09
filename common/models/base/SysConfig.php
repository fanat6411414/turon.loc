<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "sys_config".
 *
 * @property int $id
 * @property string|null $phone
 * @property string|null $email
 * @property string|null $location
 * @property int|null $file_upload_size
 * @property string|null $tg_bot_token
 * @property string|null $tg_channel
 * @property string|null $fb_channel
 * @property string|null $tw_channel
 * @property string|null $in_channel
 * @property string|null $youtube_channel
 * @property string|null $instagram_channel
 * @property string|null $seo_keywords
 * @property string|null $seo_description
 */
class SysConfig extends \common\models\base\Base
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'sys_config';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['location', 'tg_bot_token', 'tg_channel', 'fb_channel', 'tw_channel', 'in_channel', 'youtube_channel', 'instagram_channel', 'seo_keywords', 'seo_description'], 'string'],
            [['file_upload_size'], 'integer'],
            [['phone', 'email'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'phone' => 'Phone',
            'email' => 'Email',
            'location' => 'Location',
            'file_upload_size' => 'File Upload Size',
            'tg_bot_token' => 'Tg Bot Token',
            'tg_channel' => 'Tg Channel',
            'fb_channel' => 'Fb Channel',
            'tw_channel' => 'Tw Channel',
            'in_channel' => 'In Channel',
            'youtube_channel' => 'Youtube Channel',
            'instagram_channel' => 'Instagram Channel',
            'seo_keywords' => 'Seo Keywords',
            'seo_description' => 'Seo Description',
        ];
    }
}
