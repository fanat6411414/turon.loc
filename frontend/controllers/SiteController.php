<?php

namespace frontend\controllers;

use common\models\Edu;
use common\models\Fakulty;
use common\models\Manager;
use common\models\Pages;
use common\models\QabulCall;
use common\models\SysConfig;
use common\models\Usefull;
use Yii;
use frontend\models\ContactForm;
use yii\helpers\Url;

class SiteController extends FrontendController
{
    public function actionIndex()
    {
        return $this->render('index', [
            'modelQabulBanner' => QabulCall::find()->where(['status' => QabulCall::STATUS_ACTIVE])->one(),
            'modelEdub' => Edu::find()->where(['status' => Edu::STATUS_ACTIVE, 'type_edu' => Edu::STATUS_INACTIVE])->orderBy(['id' => SORT_DESC])->limit(4)->all(),
            'modelEdum' => Edu::find()->where(['status' => Edu::STATUS_ACTIVE, 'type_edu' => Edu::STATUS_ACTIVE])->orderBy(['id' => SORT_DESC])->limit(4)->all(),
            'modelUsefull' => Usefull::find()->orderBy(['position' => SORT_ASC])->all(),
        ]);
    }

    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail(Yii::$app->params['adminEmail'])) {
                Yii::$app->session->setFlash('success', 'Thank you for contacting us. We will respond to you as soon as possible.');
            } else {
                Yii::$app->session->setFlash('error', 'There was an error sending your message.');
            }
            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    public function actionManager()
    {
        $searchModel = new Manager();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->setSort([
            'defaultOrder' => ['position' => SORT_ASC],
        ]);
        return $this->render('manager/index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionFakultet()
    {
        $searchModel = new Fakulty();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->setSort([
            'defaultOrder' => ['name' => SORT_ASC],
        ]);
        return $this->render('fakultet/index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionFakultetView($id)
    {
        $model = $this->findModel($id, Fakulty::class);
        return $this->render('fakultet/view', [
            'model' => $model
        ]);
    }

    public function actionPage($id)
    {
        $model = $this->findModel($id, Pages::class);
        Yii::$app->view->registerMetaTag(['name' => 'keywords', 'content' => $model->name]);
        Yii::$app->view->registerMetaTag(['type' => 'image/jpeg', 'rel' => 'image_src', 'name' => 'link', 'content' => $this->logo()]);
        Yii::$app->view->registerMetaTag(['property' => 'og:title', 'content' => $model->name]);
        Yii::$app->view->registerMetaTag(['property' => 'og:type', 'content' => 'article']);
        Yii::$app->view->registerMetaTag(['property' => 'og:url', 'content' => Url::to('/')]);
        Yii::$app->view->registerMetaTag(['property' => 'og:image', 'content' => $this->logo()]);
        Yii::$app->view->registerMetaTag(['property' => 'telegram:channel', 'content' => SysConfig::findOne(1)->tg_channel]);
        Yii::$app->view->registerMetaTag(['property' => 'og:site_name', 'content' => 'Turon universiteti rasmiy veb sayti']);
        return $this->render('view', ['model' => $model]);
    }

    public function actionAbout()
    {
        return $this->render('about');
    }
}