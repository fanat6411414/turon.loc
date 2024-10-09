<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "s_files".
 *
 * @property int $id
 * @property string $alias
 * @property string|null $name
 * @property string $_filename
 * @property string $_extension
 * @property string $type
 * @property int|null $_size
 * @property int|null $status
 * @property int $created_at
 * @property int|null $updated_at
 */
class SFiles extends \common\models\base\Base
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 's_files';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['alias', '_filename', '_extension', 'type', 'created_at'], 'required'],
            [['_size', 'status', 'created_at', 'updated_at'], 'integer'],
            [['alias', 'name', '_filename'], 'string', 'max' => 255],
            [['_extension'], 'string', 'max' => 10],
            [['type'], 'string', 'max' => 50],
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
            '_filename' => 'Filename',
            '_extension' => 'Extension',
            'type' => 'Type',
            '_size' => 'Size',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
