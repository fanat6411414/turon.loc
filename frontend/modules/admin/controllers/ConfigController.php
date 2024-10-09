<?php

namespace frontend\modules\admin\controllers;

use common\models\SysConfig;
use Yii;
use yii\helpers\Json;

class ConfigController extends AdminController
{
    public function actionContact()
    {
        $model = SysConfig::findOne(1);
        if ($model->load(Yii::$app->request->post())) {
            if($model->_save()) $this->addSuccess('Saqlandi');
            else $this->addError(Json::encode($model->getErrors()));
        }
        return $this->render('contact', ['model' => $model]);
    }

    public function actionSocial()
    {
        $model = SysConfig::findOne(1);
        if ($model->load(Yii::$app->request->post())) {
            if($model->_save()) $this->addSuccess('Saqlandi');
            else $this->addError(Json::encode($model->getErrors()));
        }
        return $this->render('social', ['model' => $model]);
    }

    public function actionConfig()
    {
        $model = SysConfig::findOne(1);
        if ($model->load(Yii::$app->request->post())) {
            if($model->_save()) $this->addSuccess('Saqlandi');
            else $this->addError(Json::encode($model->getErrors()));
        }
        return $this->render('config', ['model' => $model]);
    }
}