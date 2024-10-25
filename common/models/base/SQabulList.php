<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "s_qabul_list".
 *
 * @property int $id
 * @property string $alias
 * @property string $name
 * @property string $phone
 * @property int|null $status
 * @property int $type
 * @property int|null $edu_id
 * @property int $time
 * @property string|null $result
 * @property int|null $result_time
 * @property int|null $admin
 */
class SQabulList extends \common\models\base\Base
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 's_qabul_list';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['alias', 'name', 'phone', 'type', 'time'], 'required'],
            [['status', 'type', 'edu_id', 'time', 'result_time', 'admin'], 'integer'],
            [['result'], 'string'],
            [['alias', 'name', 'phone'], 'string', 'max' => 255],
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
            'status' => 'Status',
            'type' => 'Type',
            'edu_id' => 'Edu ID',
            'time' => 'Time',
            'result' => 'Result',
            'result_time' => 'Result Time',
            'admin' => 'Admin',
        ];
    }
}
