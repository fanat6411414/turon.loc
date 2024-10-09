<?php

namespace common\models;

use common\models\base\SMenuFooter;
use Yii;
use yii\helpers\ArrayHelper;
use yii\helpers\Inflector;
use yii\helpers\Json;

class MenuFooter extends SMenuFooter
{
    public $nameUz;
    public $nameRu;
    public $nameEn;

    public function rules()
    {
        $parentRules = parent::rules();
        unset($parentRules[0]);
        return array_merge($parentRules, [
            [['alias', 'name', 'type'], 'required', 'on' => [self::SCENARIO_ADD, self::SCENARIO_EDIT]],
            [['nameUz', 'nameRu', 'nameEn'], 'string', 'max' => 255],
            [['url'], 'url'],
        ]);
    }

    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'alias' => Yii::t('app', 'Alias'),
            'name' => Yii::t('app', 'Name'),
            'type' => Yii::t('app', 'Type'),
            'page_id' => Yii::t('app', 'Page'),
            'action' => Yii::t('app', 'Action'),
            'url' => Yii::t('app', 'Url'),
            '_tranlate' => Yii::t('app', 'Translate'),
            'status' => Yii::t('app', 'Status'),
        ];
    }

    public function _save()
    {
        if($this->isNewRecord){
            $this->alias = time().Yii::$app->getSecurity()->generateRandomString(6);
        }
        try{
            $transaction = Json::decode($this->_tranlate);
        } catch(\Exception $e){
            $transaction = [];
        }
        $transaction['name'] = [
            'uz' => $this->nameUz,
            'ru' => $this->nameRu,
            'en' => $this->nameEn,
        ];
        $this->_tranlate = Json::encode($transaction);
        return $this->save();
    }

    public function afterFind()
    {
        try{
            $transaction = Json::decode($this->_tranlate);
        } catch(\Exception $e){
            $this->_tranlate = '';
            $this->save();
            $transaction = [];
        }
        if(!empty($transaction['name'])){
            if(isset($transaction['name']['uz'])) $this->nameUz = $transaction['name']['uz'];
            if(isset($transaction['name']['ru'])) $this->nameRu = $transaction['name']['ru'];
            if(isset($transaction['name']['en'])) $this->nameEn = $transaction['name']['en'];
        }
    }

    public function getName($lang = null){
        if($lang == null){ $lang = Yii::$app->language; }
        try {
            $model = Json::decode($this->_tranlate);
            if(isset($model['name'][$lang]) && !empty($model['name'][$lang])){
                return $model['name'][$lang];
            }
        } catch (\Exception $e){
            return $this->name;
        }
        return $this->name;
    }

    public function getPage(int $id=null)
    {
        if($id){
            return Pages::findOne($id);
        }
        return ArrayHelper::map(Pages::findAll(['status' => Pages::STATUS_ACTIVE]), 'id', 'name');
    }

    public function getAllControllerActions()
    {
        $controllers = \yii\helpers\FileHelper::findFiles(Yii::getAlias('@frontend/controllers'), ['recursive' => true]);
        $actions = [];
        $block = [
            'controller' => ['frontend'],
            'action' => ['logout', 'login', 'settings', 'verify-email', 'signup']
        ];
        foreach ($controllers as $controller) {
            $contents = file_get_contents($controller);
            $controllerId = Inflector::camel2id(substr(basename($controller), 0, -14));
            if(!in_array($controllerId, $block['controller'])){
                preg_match_all('/public function action(\w+?)\(/', $contents, $result);
                foreach ($result[1] as $action) {
                    $actionId = Inflector::camel2id($action);
                    if(!in_array($actionId, $block['action'])){
                        $route = $controllerId . '/' . $actionId;
                        $actions[$route] = $route;
                    }
                }
            }
        }
        asort($actions);
        return $actions;
    }
}