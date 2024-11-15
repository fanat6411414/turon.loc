<?php

namespace frontend\modules\admin\controllers;

use common\models\SysActions;
use common\models\SysUser;
use frontend\modules\admin\models\ChangePasswordForm;
use frontend\modules\admin\models\LoginForm;
use Yii;
use yii\base\InvalidParamException;

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
        return $this->render('login', ['model' => $model]);
    }

    public function actionProfil()
    {
        try {
            $model = ChangePasswordForm::findOne(Yii::$app->user->id);
        } catch (InvalidParamException $e) {
            throw new \yii\web\BadRequestHttpException($e->getMessage());
        }
        if ($model->load(\Yii::$app->request->post()) && $model->validate() && $model->changePassword()) {
            $this->addSuccess('Parol yangilandi');
            return $this->redirect(['site/profil']);
        }
        return $this->render('password', ['model' => $model]);
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();
        return $this->redirect(['/site/login']);
    }
}