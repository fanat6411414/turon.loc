<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "s_edu".
 *
 * @property int $id
 * @property string $alias
 * @property string $name
 * @property string $desc
 * @property int|null $summ_kunduzgi
 * @property int|null $summ_sirtqi
 * @property int $type_edu
 * @property int|null $status
 * @property string|null $_tranlate
 */
class SEdu extends \common\models\base\Base
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 's_edu';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['alias', 'name', 'desc', 'type_edu'], 'required'],
            [['summ_kunduzgi', 'summ_sirtqi', 'type_edu', 'status'], 'integer'],
            [['_tranlate'], 'string'],
            [['alias', 'name', 'desc'], 'string', 'max' => 255],
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
            'desc' => 'Desc',
            'summ_kunduzgi' => 'Summ Kunduzgi',
            'summ_sirtqi' => 'Summ Sirtqi',
            'type_edu' => 'Type Edu',
            'status' => 'Status',
            '_tranlate' => 'Tranlate',
        ];
    }
}
