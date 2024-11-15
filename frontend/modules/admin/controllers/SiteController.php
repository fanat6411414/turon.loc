<?php

namespace frontend\modules\admin\controllers;

use common\models\SysActions;
use common\models\SysUser;
use frontend\modules\admin\models\LoginForm;
use Yii;

class SiteController extends AdminController
{
    public function actionIndex()
    {
        $chartqabul = [];
        $chartsecond = [];
        $charttransfer = [];

        return $this->render('index', [
            'stats' => [
                'warning' => 0,
                'done' => 0,
                'edu' => 0,
                'transfer' => 0,
            ],
            'chart' => [
                'bar' => [$chartqabul, $chartsecond, $charttransfer],
            ]
        ]);
    }

    public function actionLogin()
    {
        $this->view->title = Yii::$app->name;
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }
        $this->layout = 'main-login';
        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->redirect(['/site/index']);
        }
        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    public function actionProfil()
    {
        $this->view->title = Yii::$app->name;
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }
        $this->layout = 'main-login';
        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->redirect(['/site/index']);
        }
        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();
        return $this->redirect(['/site/login']);
    }
}