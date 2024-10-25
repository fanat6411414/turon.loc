<?php

namespace frontend\modules\admin\controllers;

use common\models\News;
use Yii;
use yii\helpers\Json;

class NewsController extends AdminController
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

    public function actionAdd()
    {
        $model = new News();
        $model->scenario = News::SCENARIO_ADD;
        if ($model->load(Yii::$app->request->post())) {
            if($model->_save()) {
                $this->addSuccess('Saqlandi');
                return $this->redirect(['/news/index']);
            }
            else $this->addError(Json::encode($model->getErrors()));
        }
        return $this->render('form', ['model' => $model]);
    }

    public function actionEdit(string $id)
    {
        $model = $this->findModel($id, News::class);
        if ($model->load(Yii::$app->request->post())) {
            if($model->_save()) {
                $this->addSuccess('Saqlandi');
                return $this->redirect(['/news/index']);
            }
            else $this->addError(Json::encode($model->getErrors()));
        }
        return $this->render('form', ['model' => $model]);
    }

    public function actionTranslate(string $id)
    {
        $model = $this->findModel($id, News::class);
        if ($model->load(Yii::$app->request->post())) {
            if($model->_save()) {
                $this->addSuccess('Saqlandi');
                return $this->redirect(['/news/index']);
            }
            else $this->addError(Json::encode($model->getErrors()));
        }
        return $this->render('tranlate', ['model' => $model]);
    }

    public function actionDelete(string $id)
    {
        $model = $this->findModel($id, News::class);
        if ($model->delete()) {
            $this->addSuccess('Saqlandi');
        } else {
            $this->addError(Yii::t('app', 'Error'));
        }
        return $this->redirect(['/news/index']);
    }
}