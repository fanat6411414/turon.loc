<?php

namespace common\models;

use common\models\base\Base;
use Yii;
use yii\base\Model;
use yii\helpers\Json;

class Cache extends Model
{
    public $cache_time = 24 * 3600; // 1 soat = 60 minut = 3600 sekund

    public function setAllMenu()
    {
        $this->setMenu('oz');
        $this->setMenu('uz');
        $this->setMenu('ru');
        $this->setMenu('en');
    }

    protected function setMenu($language){
        $cache = [];
        $cache = Yii::$app->cache->get('menu');
        $dataModel = Menu::find()->where(['status' => Base::STATUS_ACTIVE])->indexBy('id')->asArray()->all();
        $html = null;
        $tree = null;
        $dataModel = $this->setTanslate($language, $dataModel);
        $tree = $this->getTree($dataModel);
        $html = $this->getMenuHtml($tree);
        $cache[$language] = $html;
        Yii::$app->cache->set('menu', $cache);
    }

    protected function getTree($models){
        $tree = [];
        foreach($models as $id => &$node){
            if(!$node['parent']) $tree[$id] = &$node;
            else $models[$node['parent']]['childs'][$node['id']] = &$node;
        }
        return $tree;
    }

    protected function getMenuHtml($tree){
        $str = '';
        foreach($tree as $item){
            $str .= $this->catToTemplate($item);
        }
        return $str;
    }

    protected function catToTemplate($menu){
        ob_start();
        include Yii::getAlias('@frontend'). '/views/cache/menu.php';
        return ob_get_clean();
    }

    protected function setTanslate($lang, $models){
        if($lang == 'oz') return $models;
        foreach ($models as $k => $val){
            $models[$k]['name'] = $this->getValueModel($lang, $val);
        }
        return $models;
    }

    protected function getValueModel($lang, $model){
        try {
            $modelJson = Json::decode($model['_tranlate']);
            if(isset($modelJson['name'][$lang]) && !empty($modelJson['name'][$lang])){
                return $modelJson['name'][$lang];
            }
        } catch (\Exception $e){
            return $model['name'];
        }
        return $model['name'];
    }
}