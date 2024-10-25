<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "s_statistik".
 *
 * @property int $id
 * @property string $alias
 * @property int|null $create_year
 * @property int|null $students
 * @property int|null $edu
 * @property int|null $faculty
 * @property int|null $kafedra
 * @property int|null $teacher
 */
class SStatistik extends \common\models\base\Base
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 's_statistik';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['alias'], 'required'],
            [['create_year', 'students', 'edu', 'faculty', 'kafedra', 'teacher'], 'integer'],
            [['alias'], 'string', 'max' => 255],
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
            'create_year' => 'Create Year',
            'students' => 'Students',
            'edu' => 'Edu',
            'faculty' => 'Faculty',
            'kafedra' => 'Kafedra',
            'teacher' => 'Teacher',
        ];
    }
}
