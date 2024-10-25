<?php

namespace frontend\modules\admin;

use Yii;
use yii\base\Theme;

class Module extends \yii\base\Module
{
    public $controllerNamespace = 'frontend\modules\admin\controllers';
    public $defaultRoute = 'site/index';

    public function init()
    {
        parent::init();
        $this->initTheme();

        Yii::$app->set('user', [
            'class' => 'yii\web\User',
            'identityClass' => 'frontend\modules\admin\models\Auth',
            'enableAutoLogin' => true,
            'loginUrl' => ['/site/login'],
            'enableSession' => true
        ]);

        Yii::$app->set('session', [
            'class' => 'yii\web\Session',
            'name' => '_adminSessionId',
        ]);

        Yii::$app->request->baseUrl = '/admin';
    }

    private function initTheme(): void
    {
        Yii::$app->view->theme = new Theme([
            'pathMap' => ['@app/views' => '@frontend/modules/admin/template/src/views'],
            'baseUrl' => '@web/modules/admin'
        ]);
    }
}
