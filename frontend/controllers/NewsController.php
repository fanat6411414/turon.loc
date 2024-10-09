<?php

namespace frontend\controllers;

use common\models\News;
use common\models\SysConfig;
use Yii;
use yii\helpers\Url;
use yii\web\NotFoundHttpException;

class NewsController extends FrontendController
{
    public function actionIndex()
    {
        $searchModel = new News();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->setSort([
            'defaultOrder' => ['id' => SORT_DESC],
        ]);
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionView(string $id)
    {
        $model = $this->findModel($id);
        Yii::$app->view->registerMetaTag(['name' => 'keywords', 'content' => $model->name]);
        Yii::$app->view->registerMetaTag(['type' => 'image/jpeg', 'rel' => 'image_src', 'name' => 'link', 'content' => $model->img->getUrl()]);
        Yii::$app->view->registerMetaTag(['property' => 'og:title', 'content' => $model->name]);
        Yii::$app->view->registerMetaTag(['property' => 'og:type', 'content' => 'article']);
        Yii::$app->view->registerMetaTag(['property' => 'og:url', 'content' => Url::to('/')]);
        Yii::$app->view->registerMetaTag(['property' => 'og:image', 'content' => $model->img->getUrl()]);
        Yii::$app->view->registerMetaTag(['property' => 'telegram:channel', 'content' => SysConfig::findOne(1)->tg_channel]);
        Yii::$app->view->registerMetaTag(['property' => 'og:site_name', 'content' => 'Turon universiteti rasmiy veb sayti']);
        return $this->render('view', ['model' => $model]);
    }

    protected function findModel($id)
    {
        if (($model = News::findOne(['alias' => $id])) !== null) {
            return $model;
        }
        throw new NotFoundHttpException('The requested page does not exist.');
    }
}