<?php

namespace common\models;

use Yii;
use yii\helpers\Json;

class Statistik extends \common\models\base\SStatistik
{
    public function rules()
    {
        $parentRules = parent::rules();
        unset($parentRules[0]);
        return array_merge($parentRules, []);
    }

    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'alias' => Yii::t('app', 'Alias'),
            'create_year' => Yii::t('app', 'Create Year'),
            'students' => Yii::t('app', 'Students'),
            'edu' => Yii::t('app', 'Edu'),
            'faculty' => Yii::t('app', 'Faculty'),
            'kafedra' => Yii::t('app', 'Kafedra'),
            'teacher' => Yii::t('app', 'Teacher'),
        ];
    }
}